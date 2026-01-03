<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    public function Dashboard(Request $request)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        // Basic stats
        $totalItems     = DB::table('additemtable')->count();
        $totalCostPrice = DB::table('additemtable')->sum('cost_price');
        $totalSellPrice = DB::table('additemtable')->sum('sale_price');
        $profit         = $totalSellPrice - $totalCostPrice;

        // Get filter (default = monthly)
        $filter = $request->get('filter', 'monthly'); // weekly|monthly|yearly

        // Chart data based on filter
        if ($filter === 'weekly') {
            // Last 7 days grouped by day
            $chartData = DB::table('additemtable')
                ->select(
                    DB::raw('DATE(created_at) as period'),
                    DB::raw('SUM(stock) as total_stock'),
                    DB::raw('SUM(sale_price) as total_sale_price')
                )
                ->whereNotNull('created_at')
                ->where('created_at', '>=', Carbon::now()->subDays(7))
                ->groupBy('period')
                ->orderBy('period')
                ->get();

            $labels = $chartData->pluck('period')->map(function ($d) {
                return Carbon::parse($d)->format('D'); // e.g. Mon, Tue
            })->toArray();

        } elseif ($filter === 'yearly') {
            // Group by year
            $chartData = DB::table('additemtable')
                ->select(
                    DB::raw('YEAR(created_at) as period'),
                    DB::raw('SUM(stock) as total_stock'),
                    DB::raw('SUM(sale_price) as total_sale_price')
                )
                ->whereNotNull('created_at')
                ->groupBy('period')
                ->orderBy('period')
                ->get();

            $labels = $chartData->pluck('period')->toArray();

        } else { // default: monthly
            $chartData = DB::table('additemtable')
                ->select(
                    DB::raw('MONTH(created_at) as period'),
                    DB::raw('SUM(stock) as total_stock'),
                    DB::raw('SUM(sale_price) as total_sale_price')
                )
                ->whereNotNull('created_at')
                ->groupBy('period')
                ->orderBy('period')
                ->get();

            $labels = $chartData->pluck('period')->map(function ($m) {
                return Carbon::createFromFormat('!m', $m)->format('M');
            })->toArray();
        }

        $stockValues = $chartData->pluck('total_stock')->map(fn($v) => (int) $v)->toArray();
        $sellValues  = $chartData->pluck('total_sale_price')->map(fn($v) => (float) $v)->toArray();

        // Low stock items
        $lowStockItems = DB::table('additemtable')
            ->where('stock', '<', 3)
            ->get();

        $viewData = compact(
            'totalItems',
            'totalCostPrice',
            'totalSellPrice',
            'profit',
            'labels',
            'stockValues',
            'sellValues',
            'lowStockItems',
            'filter'
        );

        return Auth::user()->type === 'admin'
            ? view('admindashbord', $viewData)
            : view('dashboard', $viewData);
    }
}
