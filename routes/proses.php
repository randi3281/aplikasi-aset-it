<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\prosesController;


Route::post('login', [prosesController::class, 'login'])->name('login');
Route::post('login/lempar', [prosesController::class, 'login_lempar'])->name('login.lempar');

// Start Admin
// Start User Manajemen Admin
Route::post('/admin/user_manajemen/store', [prosesController::class, 'store'])->name('admin.user_manajemen.store');
Route::get('/admin/user_manajemen/{id}/edit', [prosesController::class, 'edit'])->name('admin.user_manajemen.edit');
Route::post('/admin/user_manajemen/{id}', [prosesController::class, 'update'])->name('admin.user_manajemen.update');
Route::delete('/admin/user_manajemen/{id}/delete', [prosesController::class, 'destroy'])->name('admin.user_manajemen.delete');
// End User Manajemen Admin

// Start Data Barang Admin
Route::post('/admin/databarang/pilihan', [prosesController::class, 'data_barang_pilihan'])->name('admin.data_barang.pilihan');
// End Data Barang Admin

// Start Mutasi Admin
Route::post('/mutasipilihan', [prosesController::class, 'mutasipilihan'])->name('mutasi_pilihan');
// End Mutasi Admin

// Start Penghapusan Admin
Route::post('/penghapusanilihan', [prosesController::class, 'penghapusanpilihan'])->name('penghapusan_pilihan');
// End Penghapusan Admin

// Start Export To Excel Admin
Route::post('/export_data_barang', [prosesController::class, 'export_data_barang'])->name('export.data_barang');
Route::post('/export_mutasi', [prosesController::class, 'export_mutasi'])->name('export.mutasi');
Route::post('/export_penghapusan', [prosesController::class, 'export_penghapusan'])->name('export.penghapusan');
// End Export To Excel Admin
// End Admin

// Start Pengguna
// Pengguna Data Barang
Route::post('/pengguna/databarang/store', [prosesController::class, 'store_pengguna'])->name('pengguna.store');
Route::get('/pengguna/databarang/{id}/edit', [prosesController::class, 'edit_pengguna'])->name('pengguna.edit');
Route::post('/pengguna/databarang/{id}', [prosesController::class, 'update_pengguna'])->name('pengguna.update');
Route::get('/pengguna/databarang/{id}/delete', [prosesController::class, 'destroy_pengguna'])->name('pengguna.delete');
// End Pengguna Data Barang
// End Pengguna
