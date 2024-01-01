<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard.home');
});

Route::get('/baru', function () {
    return view('dashboard.baru');
});

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login']);
Route::resource('auth', AuthController::class);
Route::resource('buku', BukuController::class);