<?php

use App\Http\Controllers\ViewController;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;


Route::get('login', [ViewController::class, 'index'])->name('login')->middleware('guest');
Route::post('login_redirect', [ViewController::class, 'login']);
Route::get('register', [ViewController::class, 'register']);
Route::post('register_redirect', [CrudController::class, 'register_redirect']);
Route::get('logout', [ViewController::class, 'logout']);

Route::group(['middleware' => ['auth', 'ceklevel:admin,mahasiswa,dosen']], function(){
    Route::get('dashboard', [ViewController::class, 'dashboard']);
    Route::get('viewNota', [ViewController::class, 'nota_sidang']);


});

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function(){
    Route::get('viewMahasiswa', [ViewController::class, 'view_mahasiswa']);
    Route::get('tambahMahasiswa', [ViewController::class, 'Mahasiswa']);
    Route::get('viewDosen', [ViewController::class, 'view_dosen']);
    Route::get('tambahDosen', [ViewController::class, 'Dosen']);
    //CrudController-Dosen
    Route::post('simpanDosen', [CrudController::class, 'simpan_dosen']);
    Route::get('editDosen/{nid}', [CrudController::class, 'edit_profile_dosen']);
    Route::post('updateDosen/{nid}', [CrudController::class, 'update_profile_dosen']);
    //CrudController-Mahasiswa
    Route::post('simpanMahasiswa', [CrudController::class, 'simpan_mahasiswa']);
    Route::get('editMahasiswa/{nim}', [CrudController::class, 'edit_profile_mahasiswa']);
    Route::post('updateMahasiswa/{nim}', [CrudController::class, 'update_profile_mahasiswa']);
});

Route::group(['middleware' => ['auth', 'ceklevel:mahasiswa,admin']], function(){
    Route::get('pengajuan', [ViewController::class, 'pengajuan']);
    Route::get('daftarPengajuan', [ViewController::class, 'daftar_pengajuan']);
    Route::get('daftarSidang', [ViewController::class, 'daftar_sidang']);
    Route::get('viewJadwalMahasiswa', [ViewController::class, 'view_jadwal_mhs']);

    //CrudController-Pengajuan
    Route::get('editProfile/{nim}', [CrudController::class, 'edit_profile']);
    Route::get('editPengajuan/{id}', [CrudController::class, 'edit_pengajuan']);
    Route::post('simpanPengajuan', [CrudController::class, 'simpan_pengajuan']);
    Route::post('updatePengajuan/{id}', [CrudController::class, 'update_pengajuan']);
    Route::get('hapusPengajuan/{id}', [CrudController::class, 'hapus_pengajuan']);

    Route::post('simpanSidang', [CrudController::class, 'simpan_sidang']);
});

Route::group(['middleware' => ['auth', 'ceklevel:dosen,admin']], function(){
    Route::get('dataPengajuan', [ViewController::class, 'data_pengajuan']);
    Route::get('daftarNota', [ViewController::class, 'tambah_nota']);
    Route::get('viewDaftarSidang', [ViewController::class, 'view_sidang']);
    Route::get('aturJadwal', [ViewController::class, 'atur_jadwal']);
    Route::get('nilaiPenguji', [ViewController::class, 'nilai_penguji']);
    Route::get('viewJadwal', [ViewController::class, 'view_jadwal']);

    Route::post('simpanJadwal', [CrudController::class, 'simpan_jadwal']);
    Route::post('simpanNota', [CrudController::class, 'simpan_nota']);
    Route::get('updateStatusTerima/{id}', [CrudController::class, 'update_status_terima']);
    Route::get('updateStatusTolak/{id}', [CrudController::class, 'update_status_tolak']);
});
