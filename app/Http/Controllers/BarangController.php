<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::with("kategori")->get();
        return response()->json($barang);
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
        $barang = Barang::create([
            "barang_nama" => $request['barang_nama'],
            "barang_harga" => $request['barang_harga'],
            "barang_kategori" => $request['barang_kategori']
        ]);   
        return response()->json([
            'message' => 'Data berhasil disimpan',
            'data' => $barang
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::with('kategori')->find($id);
        if (!$barang) {
            return response()->json([
                'message' => 'Barang tidak ditemukan'
            ], 404);
        }
    
        return response()->json($barang);
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
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    
        $barang->barang_nama = $request->barang_nama;
        $barang->barang_harga = $request->barang_harga;
        $barang->barang_kategori = $request->barang_kategori;
        $barang->save();
    
        return response()->json([
            'message' => 'Data berhasil diupdate',
            'data' => $barang
        ], 200);  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return response()->json([
            'message' => 'Data berhasil dihapus.'
        ], 200);
    }
}
