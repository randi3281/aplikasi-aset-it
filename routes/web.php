<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::post('/login', [HomeController::class, 'login'])->name('login');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register', [HomeController::class, 'store'])->name('store');

// intinya yang salah-salah disini
Route::get('/login', [HomeController::class, 'salahlogin'])->name('salahlogin');
Route::get('/{salahweb}', [HomeController::class, 'salahweb'])->name('salahweb');
