<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KHSController;
use App\Http\Controllers\UTSController;
use App\Http\Controllers\UASController;
use App\Http\Controllers\KRSPaketController;
use App\Http\Controllers\KRSController;


//dasboard
Route::resource('/', DashboardController::class);

//login
Route::post('/logindata', [LoginController::class, 'masuk']);
Route::get('logout', [LoginController::class, 'logout']);
Route::get('mahasiswa_login', [LoginController::class, 'mahasiswa']);

//mahasiswa
Route::resource('mahasiswa_index', MahasiswaController::class);
Route::post('editpass', [MahasiswaController::class, 'edit_password']);
Route::get('editdatadiri', [MahasiswaController::class, 'editdatadiri']);

Route::resource('mahasiswa_khs', KHSController::class);
Route::post('mahasiswa_khs_sort', [KHSController::class, 'mahasiswa_khs_sort']);
Route::post('khs_cetak', [KHSController::class, 'khs_cetak']);

Route::resource('mahasiswa_uts', UTSController::class);
Route::get('uts_cetak', [UTSController::class, 'uts_cetak']);

Route::resource('mahasiswa_uas', UASController::class);
Route::get('uas_cetak', [UASController::class, 'uas_cetak']);

//krs
Route::resource('mahasiswa_krspaket', KRSPaketController::class);
Route::get('krspaketid/{MKPaketID}', [KRSPaketController::class, 'krspaketid']);
Route::post('krspaket_kelas', [KRSPaketController::class, 'krspaket_kelas']);
Route::post('krspaket_ambilkrs', [KRSPaketController::class, 'krspaket_ambilkrs']);
Route::resource('mahasiswa_krs', KRSController::class);
Route::get('krs_pilih', [KRSController::class, 'krs_pilih']);

//json krs
Route::post('ajax/tambahKRS', [KRSController::class, 'ajaxTambahKRS']);










