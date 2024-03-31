<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\prosesController;


Route::post('login', [prosesController::class, 'login'])->name('login');

Route::post('/admin/user/store', [prosesController::class, 'store'])->name('admin.user.store');
Route::get('/admin/user/{id}/edit', [prosesController::class, 'edit'])->name('admin.user.edit');
Route::post('/admin/user/{id}', [prosesController::class, 'update'])->name('admin.user.update');
Route::delete('/admin/user/{id}/delete', [prosesController::class, 'destroy'])->name('admin.user.delete');
