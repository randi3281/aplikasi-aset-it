<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\prosesController;


Route::post('login', [prosesController::class, 'login'])->name('login');
Route::post('login/lempar', [prosesController::class, 'login_lempar'])->name('login.lempar');

// Start Admin
// Start User Manajemen Admin
Route::post('/admin/user_manajemen/store', [prosesController::class, 'admin_usermanajemen_store'])->name('admin.user_manajemen.store');
Route::get('/admin/user_manajemen/{id}/edit', [prosesController::class, 'admin_usermanajemen_edit'])->name('admin.user_manajemen.edit');
Route::post('/admin/user_manajemen/{id}', [prosesController::class, 'admin_usermanajemen_update'])->name('admin.user_manajemen.update');
Route::delete('/admin/user_manajemen/{id}/delete', [prosesController::class, 'admin_usermanajemen_destroy'])->name('admin.user_manajemen.delete');
// End User Manajemen Admin

// Start Export To Excel Admin
Route::post('/export_data_barang', [prosesController::class, 'export_data_barang'])->name('export.data_barang');
Route::post('/export_mutasi', [prosesController::class, 'export_mutasi'])->name('export.mutasi');
Route::post('/export_penghapusan', [prosesController::class, 'export_penghapusan'])->name('export.penghapusan');
// End Export To Excel Admin
// End Admin

// Start Campur
// Start Data Barang
Route::post('/data_barang/pilihan', [prosesController::class, 'data_barang_pilihan'])->name('data_barang.pilihan');
// End Data Barang

// Start Mutasi
Route::post('/mutasi/pilihan', [prosesController::class, 'mutasi_pilihan'])->name('mutasi_pilihan');
// End Mutasi

// Start Penghapusan
Route::post('/penghapusan/pilihan', [prosesController::class, 'penghapusan_pilihan'])->name('penghapusan_pilihan');
// End Penghapusan
// End Campur

// Start Pengguna
// Pengguna Data Barang
Route::post('/pengguna/data_barang/store', [prosesController::class, 'pengguna_databarang_store'])->name('pengguna.data_barang.store');
Route::get('/pengguna/data_barang/{id}/edit', [prosesController::class, 'pengguna_databarang_edit'])->name('pengguna.data_barang.edit');
Route::post('/pengguna/data_barang/{id}', [prosesController::class, 'pengguna_databarang_update'])->name('pengguna.data_barang.update');
Route::get('/pengguna/data_barang/{id}/delete', [prosesController::class, 'pengguna_databarang_destroy'])->name('pengguna.data_barang.delete');
// End Pengguna Data Barang
// End Pengguna
