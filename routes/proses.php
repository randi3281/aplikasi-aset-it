<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\prosesController;


Route::post('login', [prosesController::class, 'login'])->name('login');
Route::post('login/lempar', [prosesController::class, 'login_lempar'])->name('login.lempar');

Route::post('/admin/user/store', [prosesController::class, 'store'])->name('admin.user.store');
Route::get('/admin/user/{id}/edit', [prosesController::class, 'edit'])->name('admin.user.edit');
Route::post('/admin/user/{id}', [prosesController::class, 'update'])->name('admin.user.update');
Route::delete('/admin/user/{id}/delete', [prosesController::class, 'destroy'])->name('admin.user.delete');
Route::post('/databarangpilihan', [prosesController::class, 'databarangpilihan'])->name('data_barang_pilihan');
Route::post('/mutasipilihan', [prosesController::class, 'mutasipilihan'])->name('mutasi_pilihan');
Route::post('/penghapusanpilihan', [prosesController::class, 'penghapusanpilihan'])->name('penghapusan_pilihan');
