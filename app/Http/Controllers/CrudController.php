<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CrudController extends Controller
{

    //START CRUD
    //Input-Registrasi_User
    public function register_redirect(Request $a)
    {
        $messages = [
            'required' => 'Data harus diisi!',
            'email' => 'Alamat email tidak valid',
        ];

        $cekvalidasi = $a->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ], $messages);

        User::create([
            'name' => $a->name,
            'email' => $a->email,
            'password' => Hash::make($a->password)
        ]);
        return redirect('/login')->with('Berhasil', 'Akun berhasil dibuat!');
    }

    //Input-Pengajuan
    public function simpan_pengajuan(Request $a)
    {
        $messages = [
            'required' => 'Data harus diisi!',
            'max' => 'Ukuran tidak boleh lebih dari 2mb',
            'numeric' => 'Harus menggunakan angka',
            'file.required' => 'File surat tidak boleh kosong!',
            'file.mimes' => 'File harus berupa file dengan tipe: pdf dengan ukuran max: 2048',
        ];

        $cekvalidasi = $a->validate([
            'nim' => 'required',
            'judul_proposal' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ], $messages);

        $file = $a->file('file');
        $nama_file = time() . "-" . $file->getClientOriginalName();
        $ekstensi = $file->getClientOriginalExtension();
        $ukuran = $file->getSize();
        $patAsli = $file->getRealPath();
        $namaFolder = 'file_proposal';
        $file->move($namaFolder, $nama_file);
        $pathPublic = $namaFolder . "/" . $nama_file;

        pengajuan::create([
            'nim' => $a->nim,
            'judul_proposal' => $a->judul_proposal,
            'file' => $pathPublic
        ], $cekvalidasi);
        return redirect('/pengajuan')->with('Berhasil', 'Data berhasil di simpan!');
    }

    //Input-Dashboard_Mahasiswa
    public function simpan_mahasiswa(Request $a)
    {
        $messages = [
            'required' => 'Data harus diisi!',
            'max' => 'Ukuran tidak boleh lebih dari 2mb',
            'numeric' => 'Harus menggunakan angka',
            'image' => 'File harus berbentuk jpg,png,jpeg,gif,svg'
        ];

        $cekvalidasi = $a->validate([
            'nim' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'id_prodi' => 'required|numeric',
            'tahun_masuk' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], $messages);

        $file = $a->file('foto');
        if (empty($file)) {
            mahasiswa::create([
                'nim' => $a->nim,
                'id_prodi' => $a->id_prodi,
                'jenis_kelamin' => $a->jenis_kelamin,
                'id_user' => $a->id_user,
                'tahun_masuk' => $a->tahun_masuk
            ], $cekvalidasi);
        } else {
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $ekstensi = $file->getClientOriginalExtension();
            $ukuran = $file->getSize();
            $pathAsli = $file->getRealPath();
            $nama_folder = 'foto';
            $file->move($nama_folder, $nama_file);
            $pathPublic = $nama_folder . "/" . $nama_file;

            mahasiswa::create([
                'nim' => $a->nim,
                'id_user' => $a->id_user,
                'jenis_kelamin' => $a->jenis_kelamin,
                'id_prodi' => $a->id_prodi,
                'tahun_masuk' => $a->tahun_masuk,
                'foto' => $pathPublic
            ], $cekvalidasi);
        }
        return redirect('/dashboard')->with('Berhasil', 'Data berhasil di simpan!');
    }

    public function simpan_dosen(Request $a)
    {
        $messages = [
            'required' => 'Data harus diisi!',
            'email' => 'Alamat email tidak valid',
            'max' => 'Angka terlalu banyak',
            'numeric' => 'Harus menggunakan angka',
            'image' => 'File harus berbentuk jpg,png,jpeg,gif,svg'
        ];

        $cekvalidasi = $a->validate([
            'nid' => 'required|numeric',
            'nama' => 'required',
            'email' => 'required|email',
            'jenis_kelamin' => 'required',
            'id_prodi' => 'required|numeric',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], $messages);

        $file = $a->file('foto');
        if (empty($file)) {
            Dosen::create([
                'nid' => $a->nid,
                'nama' => $a->nama,
                'email' => $a->email,
                'jenis_kelamin' => $a->jenis_kelamin,
                'id_prodi' => $a->id_prodi,
            ], $cekvalidasi);
        } else {
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $ekstensi = $file->getClientOriginalExtension();
            $ukuran = $file->getSize();
            $pathAsli = $file->getRealPath();
            $nama_folder = 'foto';
            $file->move($nama_folder, $nama_file);
            $pathPublic = $nama_folder . "/" . $nama_file;

            Dosen::create([
                'nid' => $a->nid,
                'nama' => $a->nama,
                'email' => $a->email,
                'jenis_kelamin' => $a->jenis_kelamin,
                'id_prodi' => $a->id_prodi,
                'foto' => $pathPublic
            ], $cekvalidasi);
        }
        return redirect('/dashboard')->with('Berhasil', 'Data berhasil di simpan!');
    }
    //End-Input

    //Hapus
    public function hapus($nim)
    {
        $data = mahasiswa::find($nim);
        $data->delete($nim);
        return redirect('index');
    }
    //Edit
    public function edit($nim)
    {

        $data = mahasiswa::find($nim);
        return view('editmhs', ['edit' => $data]);
    }

    //Update-Dashboard_Mahasiswa
    public function update($nim, Request $a)
    {
        $messages = [
            'required' => 'Data harus diisi!',
            'email' => 'Alamat email tidak valid',
            'max' => 'Angka terlalu banyak',
            'numeric' => 'Harus menggunakan angka',
            'image' => 'File harus berbentuk jpg,png,jpeg,gif,svg'
        ];

        mahasiswa::where("nim", "$nim")->update([
            $cekvalidasi = $a->validate([
                'nim' => 'required|numeric',
                'nama' => 'required',
                'alamat' => 'required',
                'email' => 'required|email',
                'nohp' => 'required|numeric',
                'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ], $messages)
        ]);
        mahasiswa::create($cekvalidasi);
        return redirect('index')->with('Berhasil', 'Data berhasil di simpan!');
    }

    //END CRUD

}
