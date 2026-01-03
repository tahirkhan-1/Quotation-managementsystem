<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Display_items extends Controller
{
    public function edit($id)
{
    $item = Additem::findOrFail($id);
    return view('items.edit', compact('item'));
}
/**
 * Update the specified item in storage.
 */
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'cost_price' => 'required|numeric|min:0',
        'sale_price' => 'required|numeric|min:0',
        'gst' => 'required|numeric|min:0|max:100',
        'stock' => 'required|integer|min:0',
        'barcode' => 'required|string|unique:additems,barcode,' . $id
    ]);

    $item = Additem::findOrFail($id);
    $item->update($validated);

    return redirect()->route('display.items')
        ->with('success', 'Item updated successfully!');
}
}
