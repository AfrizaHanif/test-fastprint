<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class DataController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required|numeric|min:0',
            'kategori_id' => 'required|exists:kategori,id_kategori',
            'status_id'   => 'required|exists:status,id_status',
        ]);

        // Insert data into database
        Produk::create($validated);

        // Return to view
        return redirect()->route('main.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::findOrFail($id);
        return response()->json($produk);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate data
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required|numeric|min:0',
            'kategori_id' => 'required|exists:kategori,id_kategori',
            'status_id'   => 'required|exists:status,id_status',
        ]);

        // Update data
        $produk = Produk::findOrFail($id);
        $produk->update($validated);

        // Return to view
        return redirect()->route('main.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete data
        $produk = Produk::findOrFail($id);
        $produk->delete();

        // Return to view
        return redirect()->route('main.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function delete_all()
    {
        // Delete all data
        Produk::query()->delete();

        // Return to view
        return redirect()->route('main.index')->with('success', 'Semua data berhasil dihapus.');
    }

    public function reset()
    { // Return to view
        return redirect()->route('main.index')->with('success', 'Semua data berhasil direset.');
    }
}
