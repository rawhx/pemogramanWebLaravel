<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return response()->json($kategori);
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
        $kategori = Kategori::create([
            "kategori_nama" => $request['kategori_nama']
        ]);   
        return response()->json([
            'message' => 'Kategori berhasil disimpan',
            'data' => $kategori
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Kategori::find($id);        
        if (!$kategori) {
            return response()->json([
                'message' => 'Kategori tidak ditemukan'
            ], 404);
        }
    
        return response()->json($kategori);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json([
                'message' => 'Data kategori tidak ditemukan'
            ], 404);
        }
    
        $kategori->kategori_nama = $request->kategori_nama;
        $kategori->save();
    
        return response()->json([
            'message' => 'Kategori berhasil diupdate',
            'data' => $kategori
        ], 200);  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return response()->json([
            'message' => 'Kategori berhasil dihapus.'
        ], 200);
    }
}
