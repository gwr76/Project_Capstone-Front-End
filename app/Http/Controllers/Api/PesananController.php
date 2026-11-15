<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->role !== 'pembeli') {
            return response()->json(['success' => false, 'message' => 'Hanya pembeli yang dapat membuat pesanan!'], 403);
        }

        $request->validate([
            'id_akungame' => 'required|exists:tb_produk,id_akungame'
        ]);

        $produk = Produk::find($request->id_akungame);

        if ($produk->status !== 'Tersedia') {
            return response()->json([
                'success' => false,
                'message' => 'Maaf, produk ini sudah tidak tersedia atau sedang dipesan orang lain.'
            ], 400);
        }

        $pesanan = new Pesanan();
        $pesanan->id_pembeli = $user->id_user; 
        
        $pesanan->id_akungame = $produk->id_akungame; 
        
        $pesanan->total_harga = $produk->harga; 
        $pesanan->status_pesanan = 'Menunggu Pembayaran';
        $pesanan->save();

        $produk->status = 'Dipesan';
        $produk->save();

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dibuat! Silakan lanjutkan ke pembayaran.',
            'data' => $pesanan
        ], 201);
    }
    
    // Melihat daftar pesanan (Khusus Pembeli)
    public function riwayatPesanan()
    {
        $user = auth()->user();

        if ($user->role !== 'pembeli') {
            return response()->json(['success' => false, 'message' => 'Akses ditolak!'], 403);
        }

        // Ambil semua pesanan milik pembeli yang sedang login
        $pesanan = Pesanan::where('id_pembeli', $user->id_user)->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar riwayat pesanan',
            'data' => $pesanan
        ], 200);
    }

    // public function bayarPesanan($id)
    // {
    //     $user = auth()->user();

        
    //     $pesanan = Pesanan::find($id);

    //     if (!$pesanan) {
    //         return response()->json(['success' => false, 'message' => 'Pesanan tidak ditemukan!'], 404);
    //     }

       
    //     if ($pesanan->id_pembeli !== $user->id_user) {
    //         return response()->json(['success' => false, 'message' => 'Anda tidak berhak mengakses pesanan ini!'], 403);
    //     }

       
    //     if ($pesanan->status_pesanan !== 'Menunggu Pembayaran') {
    //         return response()->json(['success' => false, 'message' => 'Pesanan ini tidak dalam tahap pembayaran.'], 400);
    //     }

    //     $pesanan->status_pesanan = 'Sudah Dibayar';
    //     $pesanan->save();

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Pembayaran berhasil dikonfirmasi! Menunggu proses dari penjual.',
    //         'data' => $pesanan
    //     ], 200);
    // }

   public function bayar(\Illuminate\Http\Request $request, $id)
    {
        // 1. Cari pesanan berdasarkan ID
        $pesanan = \App\Models\Pesanan::find($id);

        if (!$pesanan) {
            return response()->json(['success' => false, 'message' => 'Pesanan tidak ditemukan!'], 404);
        }

        // Pastikan statusnya masih Menunggu Pembayaran
        if ($pesanan->status_pesanan !== 'Menunggu Pembayaran') {
            return response()->json(['success' => false, 'message' => 'Pesanan ini tidak bisa dibayar!'], 400);
        }

        // 2. Validasi file yang diunggah
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // 3. Proses upload file bukti pembayaran
        $pathBukti = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/pembayaran'), $filename);
            $pathBukti = 'uploads/pembayaran/' . $filename;
        }

        // 4. Masukkan ke tabel Transaksi
        $transaksi = \App\Models\Transaksi::create([
            'id_pesanan' => $pesanan->id_pesanan, 
            'bukti_pembayaran' => $pathBukti,
        ]);

        // 5. Ubah status pesanan menjadi Diproses
        $pesanan->status_pesanan = 'Diproses'; 
        $pesanan->save();

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil diunggah ke tabel transaksi!',
            'data' => [
                'pesanan' => $pesanan,
                'transaksi' => $transaksi
            ]
        ], 200);
    }
    
    public function batal($id)
    {
        // Cari pesanan berdasarkan ID
        $pesanan = \App\Models\Pesanan::find($id);

        if (!$pesanan) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan tidak ditemukan!'
            ], 404);
        }

        // Ubah status pesanan menjadi Dibatalkan (Sesuaikan nama kolom status pesananmu)
        $pesanan->status_pesanan = 'Dibatalkan'; 
        $pesanan->save();

        // Kembalikan status produk menjadi Tersedia lagi
        $produk = \App\Models\Produk::find($pesanan->id_akungame);
        if ($produk) {
            $produk->status = 'Tersedia'; // Status produk agar bisa dibeli lagi
            $produk->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dibatalkan!',
            'data' => $pesanan
        ], 200);
    }
}