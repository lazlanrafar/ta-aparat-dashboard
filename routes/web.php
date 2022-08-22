<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GantiPasswordController;
use App\Http\Controllers\RuangRapatController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\NotulenController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AbsenDetailController;
use App\Http\Controllers\LaporanController;

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

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::resource('/ganti-password', GantiPasswordController::class)->middleware('auth');

Route::resource('/', DashboardController::class)->middleware('auth');
Route::resource('/pegawai', PegawaiController::class)->middleware('auth');
Route::resource('/ruang-rapat', RuangRapatController::class)->middleware('auth');

Route::resource('/peminjaman', PeminjamanController::class)->middleware('auth');
Route::get('/peminjaman/{id}/{status}', [PeminjamanController::class, 'verify'])->middleware('auth');

Route::resource('/notulen', NotulenController::class)->middleware('auth');

Route::get('/laporan', [LaporanController::class, 'index'])->middleware('auth');
Route::post('/laporan', [LaporanController::class, 'filter'])->middleware('auth');

Route::resource('/absensi', AbsenController::class)->middleware('auth');
Route::get('/absensi-detail-print/{id}', [AbsenController::class, 'print'])->middleware('auth');

Route::get('/absensi-detail/{id}', [AbsenDetailController::class, 'index'])->name('absensi-detail');
Route::post('/absensi-detail', [AbsenDetailController::class, 'store']);
