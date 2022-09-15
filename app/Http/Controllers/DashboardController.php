<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CrudController extends Controller
{
    public function dashboard(){
        return view('dashboard/dashboard');
    }

    // public function dashboard(){
    //     $data1 = Mahasiswa::count();
    //     $data2 = Dosen::count();
    //     $data3 = Pengajuan::count();
    //     $data4 = notaSidang::count();
    //     $data5 = Sidang::count();

    //     // $data = [$data1, $data2, $data3, $data4, $data5];
    //     return view('dashboard/dashboard');
    // }

    //START CRUD
    //Input-Registrasi_User
    
    //Input-Pengajuan
    // public function simpan_pengajuan(Request $a)
    // {
    //     $messages = [
    //         'required' => 'Data harus diisi!',
    //         'max' => 'Ukuran tidak boleh lebih dari 2mb',
    //         'numeric' => 'Harus menggunakan angka',
    //         'file.required' => 'File surat tidak boleh kosong!',
    //         'file.mimes' => 'File harus berupa file dengan tipe: pdf dengan ukuran max: 2048',
    //     ];

    //     $cekvalidasi = $a->validate([
    //         'nim' => 'required',
    //         'judul_proposal' => 'required',
    //         'file' => 'required|mimes:pdf|max:2048',
    //     ], $messages);

    //     $file = $a->file('file');
    //     if (empty($file)) {
    //         pengajuan::create([
    //             'nim' => $a->nim,
    //             'judul_proposal' => $a->judul_proposal,
    //         ], $cekvalidasi);
    //     } else {
    //         $nama_file = time() . "-" . $file->getClientOriginalName();
    //         $ekstensi = $file->getClientOriginalExtension();
    //         $ukuran = $file->getSize();
    //         $patAsli = $file->getRealPath();
    //         $namaFolder = 'file_proposal';
    //         $file->move($namaFolder, $nama_file);
    //         $pathPublic = $namaFolder . "/" . $nama_file;

    //         pengajuan::create([
    //             'nim' => $a->nim,
    //             'judul_proposal' => $a->judul_proposal,
    //             'file' => $pathPublic
    //         ], $cekvalidasi);
    //     }
    //     return redirect('/pengajuan')->with('Berhasil', 'Data berhasil di simpan!');
    // }

    // //Edit & Update Pengajuan
    // public function edit_pengajuan($idPengajuan)
    // {
    //     $data = Pengajuan::find($idPengajuan);
    //     return view("edit-pengajuan", ['pengajuan' => $data]);
    // }

    // public function update_pengajuan($idPengajuan, Request $a)
    // {
    //     //Validasi
    //     $messages = [
    //         'required' => 'Data harus diisi!',
    //         'max' => 'Ukuran tidak boleh lebih dari 2mb',
    //         'numeric' => 'Harus menggunakan angka',
    //         'file.required' => 'File surat tidak boleh kosong!',
    //         'file.mimes' => 'File harus berupa file dengan tipe: pdf dengan ukuran max: 2048',
    //     ];
    //     $cekValidasi = $a->validate([
    //         'nim' => 'required',
    //         'judul_proposal' => 'required',
    //         'file' => 'required|mimes:pdf|max:2048',
    //     ], $messages);

    //     $file = $a->file('file');
    //     if (file_exists($file)) {
    //         $nama_file = time() . "-" . $file->getClientOriginalName();
    //         $folder = 'file_proposal';
    //         $file->move($folder, $nama_file);
    //         $path = $folder . "/" . $nama_file;
    //         //delete
    //         $data = Pengajuan::where('id', $idPengajuan)->first();
    //         File::delete($data->file);
    //     } else {
    //         $path = $a->pathFile;
    //     }
    //     Pengajuan::where("id", "$idPengajuan")->update([
    //         'nim' => $a->nim,
    //         'judul_proposal' => $a->judul_proposal,
    //         'file' => $path
    //     ], $cekValidasi);
    //     return redirect('/pengajuan')->with('toast_success', 'Data berhasil di update!');
    // }

    // //Delete
    // public function hapus_pengajuan($idPengajuan)
    // {
    //     try {
    //         $data = Pengajuan::where('id', $idPengajuan)->first();
    //         File::delete($data->file);
    //         Pengajuan::where('id', $idPengajuan)->delete();
    //         return redirect('/pengajuan')->with('toast_success', 'Data berhasil di hapus!');
    //     } catch (\Illuminate\Database\QueryException $e) {
    //         return redirect('/pengajuan')->with('toast_error', 'Data tidak bisa di hapus!');
    //     }
    // }
}