<?php

use App\Http\Controllers\ViewController;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;


Route::get('login', [ViewController::class, 'index'])->name('login')->middleware('guest');
Route::post('login_redirect', [ViewController::class, 'login']);
Route::get('register', [ViewController::class, 'register']);
Route::post('register_redirect', [CrudController::class, 'register_redirect']);

Route::group(['middleware' => ['auth', 'ceklevel:admin,mahasiswa,dosen']], function(){
    Route::get('dashboard', [ViewController::class, 'dashboard']);
    Route::get('logout', [ViewController::class, 'logout']);

});

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function(){
    Route::get('tambahMahasiswa', [ViewController::class, 'Mahasiswa']);
    Route::get('tambahDosen', [ViewController::class, 'Dosen']);
    //CrudController-Dosen
    Route::get('edit/{nim}', [CrudController::class, 'edit']);
    Route::post('simpanDosen', [CrudController::class, 'simpan_dosen']);
    Route::post('update/{nim}', [CrudController::class, 'update']);
    Route::get('/hapus/{nim}', [CrudController::class, 'hapus']);
    //CrudController-Mahasiswa
    Route::get('edit/{nim}', [CrudController::class, 'edit']);
    Route::post('simpanMahasiswa', [CrudController::class, 'simpan_mahasiswa']);
    Route::post('update/{nim}', [CrudController::class, 'update']);
    Route::get('/hapus/{nim}', [CrudController::class, 'hapus']);
});

Route::group(['middleware' => ['auth', 'ceklevel:mahasiswa,admin']], function(){
    Route::get('pengajuan', [ViewController::class, 'pengajuan']);
    Route::get('daftarPengajuan', [ViewController::class, 'daftar_pengajuan']);
    //CrudController-Pengajuan
    Route::get('editProfile/{nim}', [CrudController::class, 'edit_profile']);
    Route::get('editPengajuan/{id}', [CrudController::class, 'edit_pengajuan']);
    Route::post('simpanPengajuan', [CrudController::class, 'simpan_pengajuan']);
    Route::post('updatePengajuan/{id}', [CrudController::class, 'update_pengajuan']);
    Route::get('hapusPengajuan/{id}', [CrudController::class, 'hapus_pengajuan']);
});

Route::group(['middleware' => ['auth', 'ceklevel:dosen,admin']], function(){
    Route::get('dataPengajuan', [ViewController::class, 'data_pengajuan']);
    Route::get('updateStatusTerima/{id}', [CrudController::class, 'update_status_terima']);
    Route::get('updateStatusTolak/{id}', [CrudController::class, 'update_status_tolak']);
});
