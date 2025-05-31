<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request; // Penting untuk validasi dan mengambil data form

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::latest()->paginate(5); // Ambil semua item, urutkan terbaru, paginasi 5 per halaman
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi Form
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        Item::create($request->all()); // Simpan data baru

        return redirect()->route('items.index')
                         ->with('success', 'Item created successfully.'); // Redirect dengan pesan sukses
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item) // Route Model Binding
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item) // Route Model Binding
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item) // Route Model Binding
    {
        // Validasi Form
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $item->update($request->all()); // Update data item

        return redirect()->route('items.index')
                         ->with('success', 'Item updated successfully.'); // Redirect dengan pesan sukses
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item) // Route Model Binding
    {
        $item->delete(); // Hapus item

        return redirect()->route('items.index')
                         ->with('success', 'Item deleted successfully.'); // Redirect dengan pesan sukses
    }
}