<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\prosesController;
use App\Http\Controllers\salahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

// intinya yang salah-salah disini
Route::get('/login', [salahController::class, 'salahlogin'])->name('login');
Route::get('/{salahweb}', [salahController::class, 'salahweb'])->name('salahweb');

// tampilan sub menu
Route::get('/usermanajemen', [HomeController::class, 'usermanajemen'])->name('usermanajemen');
