<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Pengajuan;
use App\Models\Prodi;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\File;
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
            'level' => 'required',
        ], $messages);

        User::create([
            'name' => $a->name,
            'email' => $a->email,
            'password' => Hash::make($a->password),
            'level' => $a->level,
        ], $cekvalidasi);
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
        if (empty($file)) {
            pengajuan::create([
                'nim' => $a->nim,
                'judul_proposal' => $a->judul_proposal,
            ], $cekvalidasi);
        } else {
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
        }
        return redirect('/pengajuan')->with('Berhasil', 'Data berhasil di simpan!');
    }

    //Edit & Update
    public function edit_pengajuan($idPengajuan)
    {
        $data = Pengajuan::find($idPengajuan);
        return view("edit-pengajuan", ['status' => $data]);
    }

    public function update_pengajuan($idPengajuan, Request $a)
    {
        //Validasi
        $messages = [
            'required' => 'Data harus diisi!',
            'max' => 'Ukuran tidak boleh lebih dari 2mb',
            'numeric' => 'Harus menggunakan angka',
            'file.required' => 'File surat tidak boleh kosong!',
            'file.mimes' => 'File harus berupa file dengan tipe: pdf dengan ukuran max: 2048',
        ];
        $cekValidasi = $a->validate([
            'nim' => 'required',
            'judul_proposal' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ], $messages);

        $file = $a->file('file');
        if (file_exists($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $folder = 'file_proposal';
            $file->move($folder, $nama_file);
            $path = $folder . "/" . $nama_file;
            //delete
            $data = Pengajuan::where('id', $idPengajuan)->first();
            File::delete($data->file);
        } else {
            $path = $a->pathFile;
        }
        Pengajuan::where("id", "$idPengajuan")->update([
            'nim' => $a->nim,
            'judul_proposal' => $a->judul_proposal,
            'file' => $path
        ], $cekValidasi);
        return redirect('/pengajuan')->with('toast_success', 'Data berhasil di update!');
    }

    //Delete
    public function hapus_pengajuan($idPengajuan)
    {
        try {
            $data = Pengajuan::where('id', $idPengajuan)->first();
            File::delete($data->file);
            Pengajuan::where('id', $idPengajuan)->delete();
            return redirect('/pengajuan')->with('toast_success', 'Data berhasil di hapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/pengajuan')->with('toast_error', 'Data tidak bisa di hapus!');
        }
    }

    //Update Status
    public function update_status_terima($id, Request $a)
    {
        $data = Pengajuan::where('id', $id)->first();

        Pengajuan::where('id', $id)->update([
            'status' => $a->status==1
        ]);
    }

    public function update_status_tolak($id, Request $a)
    {
        $data = Pengajuan::where('id', $id)->first();

        Pengajuan::where('id', $id)->update([
            'status' => $a->status==2
        ]);
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
                'name' => $a->name,
                'email' => $a->email,
                'id_prodi' => $a->id_prodi,
                'jenis_kelamin' => $a->jenis_kelamin,
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
                'name' => $a->name,
                'email' => $a->email,
                'jenis_kelamin' => $a->jenis_kelamin,
                'id_prodi' => $a->id_prodi,
                'tahun_masuk' => $a->tahun_masuk,
                'foto' => $pathPublic
            ], $cekvalidasi);
        }
        return redirect('/dashboard')->with('Berhasil', 'Data berhasil di simpan!');
    }

    public function edit_profile($nim)
    {
        $data1 = Prodi::all();
        $data2 = Mahasiswa::find($nim);
        return view("edit-profile", ['viewMhs' => $data1], ['viewMhs' => $data2]);
    }
    public function update_profile($nim, Request $a)
    {
        //Validasi
        $messages = [
            'required' => 'Data harus diisi!',
            'max' => 'Ukuran tidak boleh lebih dari 2mb',
            'numeric' => 'Harus menggunakan angka',
            'file.required' => 'File surat tidak boleh kosong!',
            'file.mimes' => 'File harus berupa file dengan tipe: pdf dengan ukuran max: 2048',
        ];
        $cekValidasi = $a->validate([
            'nim' => 'required',
            'judul_proposal' => 'required',
            'jenis_kelamin' => 'required',
            'id_prodi' => 'required|numeric',
            'tahun_masuk' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], $messages);

        $file = $a->file('file');
        if (file_exists($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $folder = 'file_proposal';
            $file->move($folder, $nama_file);
            $path = $folder . "/" . $nama_file;
            //delete
            $data = Mahasiswa::where('nim', $nim)->first();
            File::delete($data->file);
        } else {
            $path = $a->pathFile;
        }
        Pengajuan::where("nim", "$nim")->update([
            'nim' => $a->nim,
            'name' => $a->name,
            'email' => $a->email,
            'jenis_kelamin' => $a->jenis_kelamin,
            'id_prodi' => $a->id_prodi,
            'tahun_masuk' => $a->tahun_masuk,
            'foto' => $path
        ], $cekValidasi);
        return redirect('/dashboard')->with('toast_success', 'Data berhasil di update!');
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

    //END CRUD

}
