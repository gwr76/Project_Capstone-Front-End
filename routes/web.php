<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

route::get('/index', function () {
    return view('index');
});

Route::view('/about', 'about');
Route::view('/contact', 'contact');

// Pembeli
Route::get('/pembeli/profil', function () {
    return view('pembeli.profilesaya');
});
Route::get('/pembeli/pesanan', function () {
    return view('pembeli.pesanan');
});

// Penjual
route::get('/penjual/dashboard', function () {
    return view('penjual.dashboard_penjual');
});
route::get('/penjual/daftar_produk', function () {
    return view('penjual.daftar_produk');
});
route::get('/penjual/laporan', function () {
    return view('penjual.laporan');
});
route::get('/penjual/profile_penjual', function () {
    return view('penjual.profile_penjual');
});
route::get('/penjual/upload_produk', function () {
    return view('penjual.upload_produk');
});

route::get('/penjual/notifikasi_penjual', function () {
    return view('penjual.notifikasi_penjual');
});

// Admin
route::get('/admin/dashboard', function () {
    return view('dashboard_admin.admin_dasboard');
});
route::get('/admin/notifikasi', function () {
    return view('dashboard_admin.admin_notifikasi');
});
route::get('/admin/produk', function () {
    return view('dashboard_admin.admin_produk');
});
route::get('/admin/user', function () {
    return view('dashboard_admin.admin_user');
});
route::get('/admin/laporan', function () {
    return view('dashboard_admin.admin_laporan');
});
route::get('/admin/pesanan', function () {
    return view('dashboard_admin.admin_pesanan');
});

//produk
route::get('/produk/FF', function () {
    return view('produk.FF');
});
route::get('/produk/ML', function () {
    return view('produk.ML');
});
route::get('/produk/PUBG', function () {
    return view('produk.PUBG');
});
Route::get('/pembeli/profile', function () {
    return view('pembeli.profilesaya');
});
Route::get('/pembeli/pesanan', function () {
    return view('pembeli.pesanan');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';