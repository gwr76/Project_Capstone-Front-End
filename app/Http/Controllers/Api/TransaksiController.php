<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function approve(Request $request, $id)
    {
        $transaksi = \App\Models\Transaksi::find($id);

        if (!$transaksi) {
            return response()->json(['success' => false, 'message' => 'Transaksi tidak ditemukan!'], 404);
        }

        $transaksi->status_transaksi = 'Berhasil';
        
        $transaksi->id_admin = auth()->user()->id_user ?? 1; // Angka 1 hanya contoh jika auth belum jalan
        $transaksi->save();

        // Jangan lupa update status pesanannya juga!
        $pesanan = \App\Models\Pesanan::where('id_pesanan', $transaksi->id_pesanan)->first();
        if ($pesanan) {
            $pesanan->status_pesanan = 'Selesai'; // Atau 'Berhasil', sesuaikan dengan alur bisnismu
            $pesanan->save();
        
        $akunGame = \App\Models\AkunGame::where('id_akungame', $pesanan->id_akungame)->first();
            if ($akunGame) {
                $akunGame->status = 'Terjual'; // Pastikan nama kolom statusnya sesuai dengan di tabelmu
                $akunGame->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil disetujui!',
            'data' => $transaksi
        ], 200);

    }

    public function reject(Request $request, $id)
    {
        $transaksi = \App\Models\Transaksi::find($id);

        if (!$transaksi) {
            return response()->json(['success' => false, 'message' => 'Transaksi tidak ditemukan!'], 404);
        }

        $transaksi->status_transaksi = 'Gagal';
        

        $transaksi->id_admin = auth()->user()->id_user ?? 1; 
        $transaksi->save();

        $pesanan = \App\Models\Pesanan::where('id_pesanan', $transaksi->id_pesanan)->first();
        if ($pesanan) {
            $pesanan->status_pesanan = 'Dibatalkan'; 
            $pesanan->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Transaksi ditolak karena bukti pembayaran tidak valid!',
            'data' => $transaksi
        ], 200);
    }

    public function getPending()
    {
        $transaksi = \App\Models\Transaksi::with('pesanan')
                        ->where('status_transaksi', 'Menunggu Validasi')
                        ->get();

        if ($transaksi->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Saat ini tidak ada transaksi yang menunggu validasi.',
                'data' => []
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil daftar transaksi menunggu validasi',
            'data' => $transaksi
        ], 200);
    }
}
