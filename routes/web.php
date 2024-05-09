<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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
Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store')->middleware('auth');

Route::get('/ch', function () {
    return view('catatanharian');
})->middleware('auth');

Route::get('/logout', function () {
    // Lakukan proses logout di sini
    // Contoh: hapus sesi, lalu arahkan kembali ke halaman login
    auth()->logout();
    return redirect('/login');
})->name('logout')->middleware('auth');
