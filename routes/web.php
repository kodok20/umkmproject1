<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;

// Rute untuk Produk (Semua pengguna bisa mengakses halaman produk)
Route::get('/', function () {
    return view('produk.index');
});

Route::resource('produk', ProdukController::class);

// Rute dengan middleware dan peran (admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('umkm', UMKMController::class); // Admin dapat mengakses UMKM
    Route::resource('produk', ProdukController::class); // Admin dapat mengakses produk
});

// Rute dengan middleware dan peran (pemilik)
Route::middleware(['auth', 'role:pemilik'])->group(function () {
    Route::resource('umkm', UMKMController::class); // Pemilik dapat mengakses UMKM
    Route::resource('produk', ProdukController::class); // Pemilik dapat mengakses produk
});

// Rute dengan middleware dan peran (investor)
Route::middleware(['auth', 'role:investor'])->group(function () {
    Route::get('umkm', [UMKMController::class, 'index'])->name('umkms.index'); // Investor hanya dapat melihat daftar UMKM
    Route::get('produk', [ProdukController::class, 'index'])->name('produk.index'); // Investor hanya dapat melihat produk
});

// Rute untuk admin (Jika diperlukan rute khusus admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Rute khusus untuk admin (misalnya untuk laporan, statistik, dsb.)
});

// Rute untuk UMKM (akses umum dengan middleware 'web')
Route::middleware('web')->group(function () {
    Route::get('/umkm', [UMKMController::class, 'index'])->name('umkm.index');
    Route::get('/umkms/create', [UMKMController::class, 'create'])->name('umkms.create');
    Route::post('/umkms', [UMKMController::class, 'store'])->name('umkms.store');
    Route::get('/umkms/{umkm}', [UMKMController::class, 'show'])->name('umkms.show');
    Route::get('/umkms/{umkm}/edit', [UMKMController::class, 'edit'])->name('umkms.edit');
    Route::put('/umkms/{umkm}', [UMKMController::class, 'update'])->name('umkms.update');
    Route::delete('/umkms/{umkm}', [UMKMController::class, 'destroy'])->name('umkms.destroy');
});
