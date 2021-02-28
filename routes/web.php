<?php

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\PemeriksaController;
use App\Http\Controllers\UserController;
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
Route::group(['withoutMiddleware' => 'logged_in'], function () {
    Route::get('/', [UserController::class, 'index'])->name('login_page');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'logged_in'], function () {
//pelanggaran
    Route::group(['middleware' => 'is_pemeriksa'], function () {
        Route::get('/', [PemeriksaController::class, 'index'])->name('landing_page');

        Route::get('/data_pelanggaran', [PelanggaranController::class, 'index'])->name('data_pelanggaran');
        Route::get('/data_pelanggaran/tambah/1/', [PelanggaranController::class, 'create_kelompok'])->name('tambah_data_pelanggaran_kelompok');
        Route::get('/data_pelanggaran/tambah/1/cari', [PegawaiController::class, 'load_data']);
        Route::post('/data_pelanggaran/tambah/1/2/', [PelanggaranController::class, 'create_tingkat_hukuman'])->name('tambah_data_pelanggaran_tingkat_hukuman');
        Route::post('/data_pelanggaran/tambah/1/2/3/', [PelanggaranController::class, 'create_faktor_utama'])->name('tambah_data_pelanggaran_faktor_utama');
        Route::post('/data_pelanggaran/tambah/1/2/3/4/', [PelanggaranController::class, 'create_calculate'])->name('tambah_data_pelanggaran_calculate');
        Route::post('/data_pelanggaran/tambah/1/2/3/4/save', [PelanggaranController::class, 'store'])->name('save_all_data');
        Route::get('/data_pelanggaran/delete/{id_pelanggaran}', [PelanggaranController::class, 'destroy'])->name('delete_pelanggaran');
        Route::get('/data_pelanggaran/details/{id_pelanggaran}', [PelanggaranController::class, 'show'])->name('lihat_detail_pelanggaran');
    });
});

