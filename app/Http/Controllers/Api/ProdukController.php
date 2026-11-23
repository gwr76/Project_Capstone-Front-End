<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{

    public function index()
    {
        
        $produk = Produk::with([
            'kategori:id_kategori,nama_game',
            'penjual:id_user,nama,no_telp'
        ])
        ->where('status', 'Tersedia')
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar produk tersedia berhasil diambil',
            'data'    => $produk
        ], 200);
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'penjual') {
            return response()->json([
                'success' => false,
                'message' => 'Akses ditolak! Anda harus divalidasi sebagai penjual oleh Admin terlebih dahulu.'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'id_kategori'  => 'required|exists:tb_kategori,id_kategori',
            'harga'        => 'required|numeric|min:1000',
            'deskripsi'    => 'required|string',
            'detail_akun'  => 'required|string', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada kesalahan pada data input',
                'errors'  => $validator->errors()
            ], 422);
        }

        
        $produk = Produk::create([
            'id_penjual'  => $request->user()->id_user,
            'id_kategori' => $request->id_kategori,
            'harga'       => $request->harga,
            'deskripsi'   => $request->deskripsi,
            'detail_akun' => $request->detail_akun,
            'status'      => 'Menunggu Validasi', 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan dan menunggu validasi Admin',
            'data'    => $produk
        ], 201);
    }

   
    public function show($id)
    {
        $produk = Produk::with([
            'kategori:id_kategori,nama_game',
            'penjual:id_user,nama,no_telp'
        ])->find($id);

        if (!$produk) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail produk berhasil diambil',
            'data'    => $produk
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();

        if ($user->role !== 'penjual') {
            return response()->json(['success' => false, 'message' => 'Akses ditolak! Hanya Penjual.'], 403);
        }

        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan!'], 404);
        }

        if ($produk->id_penjual !== $user->id_user) {
            return response()->json(['success' => false, 'message' => 'Anda tidak berhak mengubah produk ini!'], 403);
        }

        if ($request->has('id_kategori')) $produk->id_kategori = $request->id_kategori;
        if ($request->has('harga')) $produk->harga = $request->harga;
        if ($request->has('deskripsi')) $produk->deskripsi = $request->deskripsi;
        if ($request->has('detail_akun')) $produk->detail_akun = $request->detail_akun;
        
        $produk->status = 'Menunggu Validasi';
        $produk->save();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diperbarui dan status kembali menunggu validasi Admin!',
            'data' => $produk
        ], 200);
    }

    
   public function destroy($id)
    {
        $user = auth()->user();

        if ($user->role !== 'penjual') {
            return response()->json(['success' => false, 'message' => 'Akses ditolak!'], 403);
        }

        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan!'], 404);
        }

        if ($produk->id_penjual !== $user->id_user) {
            return response()->json(['success' => false, 'message' => 'Anda tidak berhak menghapus produk ini!'], 403);
        }

        $produk->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus!'
        ], 200);
    }

    public function rejectProduk($id)
    {
        // Cari data produk berdasarkan ID
        $produk = \App\Models\Produk::where('id_produk', $id)->first();

        if (!$produk) {
            return response()->json([
                'success' => false,
                'message' => 'Data produk tidak ditemukan!'
            ], 404);
        }

        // Ubah status menjadi Ditolak
        $produk->status_validasi = 'Ditolak'; 
        $produk->save();

        return response()->json([
            'success' => true,
            'message' => 'Validasi produk berhasil ditolak!',
            'data' => $produk
        ], 200);
    }
}