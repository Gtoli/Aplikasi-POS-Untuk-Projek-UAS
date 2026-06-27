<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\InboundController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Dashboard Utama (Wajib Login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup Route yang Diproteksi Keamanan (Wajib Login / Auth)
Route::middleware('auth')->group(function () {
    
    // Manajemen Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Manajemen Master Kategori & Produk (Stok Gudang)
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);

    // Manajemen Transaksi Kasir (POS) - Sekarang sudah aman di dalam Auth
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/pos/add/{product}', [PosController::class, 'addToCart'])->name('pos.addToCart');
    Route::post('/pos/checkout', [PosController::class, 'checkout'])->name('pos.checkout');

    // Manajemen Inbound (Barang Masuk Supplier & Laporan Keuangan)
    Route::get('/inbound', [InboundController::class, 'index'])->name('inbound.index');
    Route::post('/inbound', [InboundController::class, 'store'])->name('inbound.store');
    Route::get('/inbound/{inbound}/edit', [InboundController::class, 'edit'])->name('inbound.edit');
Route::put('/inbound/{inbound}', [InboundController::class, 'update'])->name('inbound.update');
Route::delete('/inbound/{inbound}', [InboundController::class, 'destroy'])->name('inbound.destroy');
});

require __DIR__.'/auth.php';