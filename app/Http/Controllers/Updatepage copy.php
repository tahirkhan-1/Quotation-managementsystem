<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Additem;

class Updatepage extends Controller
{
        // Handle update
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'cost_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'gst' => 'required|numeric|min:0|max:100',
            'stock' => 'required|integer|min:0',
            'barcode' => 'required|string|max:255|unique:items,barcode,' . $id,
        ]);

        $item = Item::findOrFail($id);
        $item->update($validated);

        return redirect()->route('display_items')->with('success', 'Item updated successfully!');
    }

}
