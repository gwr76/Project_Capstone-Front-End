<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function daftarPengajuan()
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Akses ditolak! Hanya untuk Admin.'], 403);
        }

        $pengajuan = User::where('role', 'calon_penjual')->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar pengajuan penjual',
            'data' => $pengajuan
        ], 200);
    }

    public function setujuiPenjual($id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Akses ditolak!'], 403);
        }

        $user = User::find($id);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User tidak ditemukan!'], 404);
        }

        $user->role = 'penjual';
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Validasi berhasil! User sekarang adalah Penjual.',
            'data' => $user
        ], 200);
    }

    public function rejectPenjual($id)
    {
        $penjual = \App\Models\Penjual::where('id_penjual', $id)->first();

        if (!$penjual) {
            return response()->json([
                'success' => false,
                'message' => 'Data pengajuan penjual tidak ditemukan!'
            ], 404);
        }

        $penjual->status_pengajuan = 'Ditolak'; 
        $penjual->save();

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan penjual berhasil ditolak!',
            'data' => $penjual
        ], 200);
    }

    public function daftarProdukPending()
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Akses ditolak!'], 403);
        }

        $produk = Produk::with(['kategori:id_kategori,nama_game', 'penjual:id_user,nama'])
                        ->where('status', 'Menunggu Validasi')
                        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar produk menunggu validasi',
            'data' => $produk
        ], 200);
    }

  public function approveProduk($id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Akses ditolak!'], 403);
        }

        $produk = \App\Models\Produk::find($id);

        if (!$produk) {
            return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan!'], 404);
        }

        $produk->status = 'Tersedia';
        $produk->save();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil disetujui (Tersedia)!',
            'data' => $produk
        ], 200);
    }

    public function rejectProduk($id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Akses ditolak!'], 403);
        }

        $produk = \App\Models\Produk::find($id);

        if (!$produk) {
            return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan!'], 404);
        }

        $produk->status = 'Ditolak';
        $produk->save();

        return response()->json([
            'success' => true,
            'message' => 'Validasi produk berhasil ditolak!',
            'data' => $produk
        ], 200);
    }
    
}