<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/Register',[AuthController::class, 'postRegis'])->name('PostRegis');
Route::get('/berita/{id:slug}', [HomeController::class, 'berita'])->name('berita');

Route::middleware(['auth'])->group(function () {
    Route::resource('news','\App\Http\Controllers\BeritaController');
});