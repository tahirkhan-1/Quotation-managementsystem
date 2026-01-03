<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CostumerDetail;
use App\Models\Additem;
use App\Models\Create_Quotation;

class CostumerDetails extends Controller
{
    public function display_item()
    {
        // Fetch all items from additem table
        $items = Additem::orderBy('name')->get();

        return view('costumerdetails', compact('items'));
    }

    public function selectItems(Request $request ,$quotation_id = null)
    {
        $data = $request->validate([
            'items'   => 'nullable|array',
            'items.*' => 'integer|exists:additems,id', // Corrected table name to match model (additems)
        ]);

        $selectedIds   = $data['items'] ?? [];
        $items         = Additem::orderBy('name')->get();
        $selectedItems = Additem::whereIn('id', $selectedIds)->get();

       // Fetch the quotation data
        $quotation = $quotation_id ? Create_Quotation::findOrFail($quotation_id) : null;

        // Log for debugging
        \Log::info('Quotation ID: ' . $quotation_id);
        \Log::info('Quotation Data: ' . json_encode($quotation));

        return view('display_items', compact('items', 'selectedItems', 'selectedIds', 'quotation'));
    }

    public function searchItems(Request $request)
    {
        // Get the search query and trim whitespace
        $query = trim($request->get('q', ''));

        // Check if query is empty
        if (empty($query)) {
            return response()->json([]);
        }

        // Build the query for searching
        $items = Additem::query()
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('barcode', 'LIKE', "%{$query}%")
                  ->orWhere('category', 'LIKE', "%{$query}%");
            })
            ->select('id', 'name', 'category', 'barcode', 'sale_price', 'gst', 'stock')
            ->get();

        // Log the query for debugging (optional)
        \Log::info('Search query: ' . $query);
        \Log::info('Found items: ' . $items->toJson());

        return response()->json($items);
    }

    
}