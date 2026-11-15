<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar kategori game berhasil diambil',
            'data'    => $kategori
        ], 200);
    }

    
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_game' => 'required|string|max:100|unique:tb_kategori,nama_game',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada kesalahan pada data input',
                'errors'  => $validator->errors()
            ], 422);
        }

        // Simpan ke database
        $kategori = Kategori::create([
            'nama_game' => $request->nama_game,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kategori game berhasil ditambahkan',
            'data'    => $kategori
        ], 201);
    }

    
    public function show($id)
    {
        
        $kategori = Kategori::with(['produk' => function ($query) {
            $query->where('status', 'Tersedia');
        }])->find($id);

        if (!$kategori) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail kategori berhasil diambil',
            'data'    => $kategori
        ], 200);
    }
    
    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Akses ditolak! Hanya Admin.'], 403);
        }

        
        $kategori = \App\Models\Kategori::find($id);

        if (!$kategori) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak ditemukan!'
            ], 404);
        }

        
        $request->validate([
            'nama_game' => 'required|string|max:255'
        ]);

        
        $kategori->nama_game = $request->nama_game;
        $kategori->save();

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil diperbarui!',
            'data' => $kategori
        ], 200);
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak ditemukan'
            ], 404);
        }

        $kategori->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil dihapus'
        ], 200);
    }
}