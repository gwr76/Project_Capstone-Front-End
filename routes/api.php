<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\PesananController;
use App\Http\Controllers\Api\TransaksiController;

// Prefix v3 (Versi 3 API)
Route::prefix('v3')->group(function () {
    
   
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::get('/kategori/{id}', [KategoriController::class, 'show']);

    Route::get('/produk', [ProdukController::class, 'index']);
    Route::get('/produk/{id}', [ProdukController::class, 'show']);

  
    Route::middleware('auth:sanctum')->group(function () {
        
        
    Route::get('/user', [AuthController::class, 'index']);
    Route::put('/user/{id}', [AuthController::class, 'update']);
    Route::delete('/user/{id}', [AuthController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/pesanan', [PesananController::class, 'store']);
    Route::get('/pesanan/riwayat', [PesananController::class, 'riwayatPesanan']);
    Route::put('/pesanan/{id}/batal', [PesananController::class, 'batal']);
    Route::post('/pesanan/{id}/bayar', [PesananController::class, 'bayar']);

    Route::post('/kategori', [KategoriController::class, 'store']);
    Route::put('/kategori/{id}', [KategoriController::class, 'update']);
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);

        
    Route::post('/produk', [ProdukController::class, 'store']);
    Route::put('/produk/{id}', [ProdukController::class, 'update']); 
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);

    Route::post('/user/pengajuan-penjual', [AuthController::class, 'pengajuanPenjual']);
    Route::get('/admin/validasi-penjual', [AdminController::class, 'daftarPengajuan']);
    Route::put('/admin/validasi-penjual/{id}/approve', [AdminController::class, 'setujuiPenjual']);
    Route::put('/admin/validasi-penjual/{id}/reject', [AdminController::class, 'rejectPenjual']);
    Route::put('/admin/validasi-produk/{id}/approve', [AdminController::class, 'approveProduk']);
    Route::put('/admin/validasi-produk/{id}/reject', [AdminController::class, 'rejectProduk']);
    Route::put('/admin/validasi-transaksi/{id}/approve', [TransaksiController::class, 'approve']);
    Route::put('/admin/validasi-transaksi/{id}/reject', [TransaksiController::class, 'reject']);
    Route::get('/admin/validasi-transaksi', [TransaksiController::class, 'getPending']);
    Route::post('/produk', [ProdukController::class, 'store']);
    Route::put('/produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);

    Route::get('/admin/validasi-produk', [AdminController::class, 'daftarProdukPending']);
    Route::put('/admin/validasi-produk/{id}', [AdminController::class, 'validasiProduk']);
        
    });
});