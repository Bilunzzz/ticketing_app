<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipeTiket;
use Illuminate\Http\Request;

class TipeTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipeTikets = TipeTiket::all();
        return view('admin.tipe-tiket.index', compact('tipeTikets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        TipeTiket::create([
            'nama' => $payload['nama'],
        ]);

        return redirect()->route('admin.tipe-tikets.index')->with('success', 'Tipe Tiket berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payload = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $tipeTiket = TipeTiket::findOrFail($id);
        $tipeTiket->nama = $payload['nama'];
        $tipeTiket->save();

        return redirect()->route('admin.tipe-tikets.index')->with('success', 'Tipe Tiket berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TipeTiket::destroy($id);
        return redirect()->route('admin.tipe-tikets.index')->with('success', 'Tipe Tiket berhasil dihapus.');
    }
}
