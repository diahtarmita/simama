<?php


use App\Http\Controllers\CatatanHarianController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Encore\Admin\Grid\Displayers\DropdownActions;

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
// Route::get('/home', function () {
//     return view('home');
// })->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home.index')->middleware('auth');

//Route::get('/home/{id}', [HomeController::class, 'show']);


Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store')->middleware('auth');
//Route::post('/profile/save', [ProfileController::class, 'save'])->name('profile.save')->middleware('auth');
Route::get('/download-sertifikat/{id}', [ProfileController::class, 'downloadSertifikat'])->name('download.sertifikat');
//Rute untuk menampilkan form registrasi
//Route::get('/register', [ProfileController::class, 'showRegistrationForm'])->name('register');

// Rute untuk memproses data registrasi
//Route::post('/register', [ProfileController::class, 'register']);

Route::get('/catatanharian', [CatatanHarianController::class, 'index'])->middleware('auth');
Route::get('/ch/create', [CatatanHarianController::class, 'create'])->middleware('auth');
Route::post('/catatanharian', [CatatanHarianController::class, 'store'])->middleware('auth');
Route::resource('ch', CatatanHarianController::class)->middleware('auth')->except(['index', 'create', 'store', 'edit']);
Route::get('/ch/{id}/edit', [CatatanHarianController::class, 'edit'])->middleware('auth')->name('ch.edit');
Route::put('/ch/{id}', [CatatanHarianController::class, 'update'])->middleware('auth')->name('ch.update');
Route::delete('/ch/{id}', [CatatanHarianController::class, 'destroy'])->middleware('auth')->name('ch.destroy');
Route::get('/catatanharian', [CatatanHarianController::class, 'index'])->name('catatanharian.index');




Route::get('/logout', function () {
    // Lakukan proses logout di sini
    // Contoh: hapus sesi, lalu arahkan kembali ke halaman login
    auth()->logout();
    return redirect('/login');
})->name('logout')->middleware('auth');

use App\Http\Controllers\OpdController;

Route::resource('opd', OpdController::class);
