<?php

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


//login
Route::get('/',[\App\Http\Controllers\UserController::class,'index'])->name('landing_page');

//pelanggaran
Route::get('/data_pelanggaran',[\App\Http\Controllers\PelanggaranController::class,'index'])->name('data_pelanggaran');
Route::get('/data_pelanggaran/tambah/1/',[\App\Http\Controllers\PelanggaranController::class,'create_kelompok'])->name('tambah_data_pelanggaran_kelompok');
Route::get('/data_pelanggaran/tambah/1/cari',[\App\Http\Controllers\PegawaiController::class,'load_data']);
Route::post('/data_pelanggaran/tambah/1/2/',[\App\Http\Controllers\PelanggaranController::class,'create_tingkat_hukuman'])->name('tambah_data_pelanggaran_tingkat_hukuman');
Route::post('/data_pelanggaran/tambah/1/2/3/',[\App\Http\Controllers\PelanggaranController::class,'create_faktor_utama'])->name('tambah_data_pelanggaran_faktor_utama');
Route::post('/data_pelanggaran/tambah/1/2/3/4/',[\App\Http\Controllers\PelanggaranController::class,'create_calculate'])->name('tambah_data_pelanggaran_calculate');
Route::post('/data_pelanggaran/tambah/1/2/3/4/save',[\App\Http\Controllers\PelanggaranController::class,'store'])->name('save_all_data');

