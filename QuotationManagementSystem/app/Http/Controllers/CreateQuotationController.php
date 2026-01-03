<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;     
use App\Models\Create_Quotation;            

class CreateQuotationController extends Controller
{
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone'         => 'required|string|max:20',
            'datetime'      => 'required|date',
            'validity_date' => 'required|date',
            'address'       => 'required|string',
        ]);

        // DB 
        $quotation = Create_Quotation::create($validated);

    
        Session::put('quotation', $quotation);

        
        return redirect()->route('quotation.next')
                         ->with('success', 'Customer details saved successfully!');
    }

  public function nextForm()
{
    $quotation = Session::get('quotation'); 
    $items = \App\Models\Additem::all(); // Fetch items from database
    
    if (!$quotation) {
        return redirect()->route('quotation.create')->withErrors(['error' => 'Please complete customer details first.']);
    }
    
    return view('costumerdetails', compact('quotation', 'items'));
}
}
