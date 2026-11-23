<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Penjual;
use Illuminate\Support\Str;
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
    
    // Melihat daftar pesanan milik pembeli yang sedang login
    public function riwayatPesanan()
    {
        $user = auth()->user();

        // calon_penjual tetap boleh melihat riwayat belanjanya
        if (!in_array($user->role, ['pembeli', 'calon_penjual'])) {
            return response()->json(['success' => false, 'message' => 'Akses ditolak!'], 403);
        }

        $pesanan = Pesanan::with('produk.kategori')
            ->where('id_pembeli', $user->id_user)
            ->orderByDesc('created_at')
            ->orderByDesc('id_pesanan')
            ->get();

        // Nama toko penjual (tb_penjual.id_user = tb_produk.id_penjual)
        $idPenjual = $pesanan->pluck('produk.id_penjual')->filter()->unique()->values();
        $namaToko = Penjual::whereIn('id_user', $idPenjual)->pluck('nama_toko', 'id_user');

        $data = $pesanan->map(function ($p) use ($namaToko) {
            return [
                'id_pesanan' => $p->id_pesanan,
                'kode' => 'TRX-' . str_pad($p->id_pesanan, 4, '0', STR_PAD_LEFT),
                'status_pesanan' => $p->status_pesanan,
                'total_harga' => (float) $p->total_harga,
                'tanggal' => $p->created_at,
                'game' => $p->produk?->kategori?->nama_game,
                'judul' => $p->produk ? Str::limit(Str::before($p->produk->deskripsi, "\n"), 90) : 'Produk sudah tidak tersedia',
                'penjual' => $p->produk ? ($namaToko[$p->produk->id_penjual] ?? null) : null,
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Daftar riwayat pesanan',
            'data' => $data
        ], 200);
    }

    // Data login akun game. Hanya untuk pembeli pemilik pesanan, dan hanya
    // setelah pembayaran divalidasi admin (status Selesai).
    public function akun($id)
    {
        $user = auth()->user();
        $pesanan = Pesanan::with('produk')->find($id);

        if (!$pesanan || (int) $pesanan->id_pembeli !== (int) $user->id_user) {
            return response()->json(['success' => false, 'message' => 'Pesanan tidak ditemukan!'], 404);
        }

        if ($pesanan->status_pesanan !== 'Selesai') {
            return response()->json([
                'success' => false,
                'message' => 'Data akun baru tersedia setelah pembayaran divalidasi admin.'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id_pesanan' => $pesanan->id_pesanan,
                'detail_akun' => $pesanan->produk?->getAttribute('detail_akun'),
            ]
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

        // Hanya pemilik pesanan yang boleh membayar
        if ((int) $pesanan->id_pembeli !== (int) auth()->user()->id_user) {
            return response()->json(['success' => false, 'message' => 'Anda tidak berhak mengakses pesanan ini!'], 403);
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

        // Hanya pemilik pesanan yang boleh membatalkan
        if ((int) $pesanan->id_pembeli !== (int) auth()->user()->id_user) {
            return response()->json(['success' => false, 'message' => 'Anda tidak berhak mengakses pesanan ini!'], 403);
        }

        // Hanya pesanan yang belum dibayar yang bisa dibatalkan pembeli
        if ($pesanan->status_pesanan !== 'Menunggu Pembayaran') {
            return response()->json(['success' => false, 'message' => 'Pesanan ini tidak bisa dibatalkan lagi!'], 400);
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