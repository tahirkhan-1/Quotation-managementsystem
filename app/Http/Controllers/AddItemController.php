<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Additem;
use Illuminate\Validation\Rule;

class AddItemController extends Controller
{
    public function create()
    {
        return view('additempage');
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'cost_price' => 'required|numeric',
        'sale_price' => 'required|numeric',
        'gst' => 'required|numeric',
        'stock' => 'required|integer',
        'barcode' => 'required|string|unique:additemtable,barcode',
    ]);

    Additem::create($request->all());

    return redirect()->back()->with('success', 'Item added successfully!');
    }

    ///////////////////////////
           //display form
    public function display_items()
    {
        $items = Additem::all(); // Fetch all items
        return view('display_items', compact('items'));
    }
//////////////////////////////////
    // Show edit form
    public function edit($id)
    {
        $item = Additem::findOrFail($id);
       return view('edit_items', compact('item'));
    }


public function update(Request $request, $id)
{
    $item = Additem::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'cost_price' => 'required|numeric|min:0',
        'sale_price' => 'required|numeric|min:0',
        'gst' => 'required|numeric|min:0|max:100',
        'stock' => 'required|integer|min:0',
        'barcode' => [
            'required',
            'string',
            'max:255',
            Rule::unique('additemtable')->ignore($item->id), // ✅ Correct usage
        ],
    ]);

    $item->update($validated);

    return redirect()->route('display.items')->with('success', 'Item updated successfully!');
}

    ////////////////////////////////////
                //delete

        public function destroy($id)
    {
        $item = Additem::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Item deleted successfully!');
    }

    // Show the edit form




    
}