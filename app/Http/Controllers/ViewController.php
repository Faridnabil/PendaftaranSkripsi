<?php

namespace App\Http\Controllers;

use App\Models\daftar_sidang;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\notaSidang;
use App\Models\Pengajuan;
use App\Models\Prodi;
use App\Models\Sidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    //START TAMPILAN
    //Dashboard
    public function dashboard(){
        $data1 = Mahasiswa::count();
        $data2 = Dosen::count();
        $data3 = Pengajuan::count();
        $data4 = notaSidang::count();
        $data5 = Sidang::count();

        $data = [$data1, $data2, $data3, $data4, $data5];
        return view('dashboard', ['data' => $data]);
    }

    //Login
    public function index(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    //Pengajuan
    public function pengajuan()
    {
        $data = Pengajuan::all();
        return view('pengajuan', ['viewMhs' => $data]);
    }

    public function data_pengajuan()
    {
        $data = Pengajuan::all();
        return view('data-pengajuan', ['viewMhs' => $data]);
    }

    public function daftar_pengajuan(){
        $data = Pengajuan::all();
        return view('daftar-pengajuan', ['viewMhs' => $data]);
    }

    //Nota Sidang
    public function nota_sidang()
    {
        $data1 = notaSidang::all();
        return view('nota-sidang', ['nota' => $data1]);
    }

    public function tambah_nota(){
        $data1 = Prodi::all();
        $data2 = Dosen::all();
        $data3 = Pengajuan::all();
        $data = [$data1, $data2, $data3];
        return view('daftar-nota', ['nota' => $data]);
    }

    //Nota Sidang
    public function view_sidang()
    {
        $data1 = daftar_sidang::all();
        return view('view-daftar-sidang', ['sidang' => $data1]);
    }

    public function daftar_sidang(){
        $data1 = Prodi::all();
        $data2 = daftar_sidang::all();
        return view('daftar-sidang', ['sidang' => $data1], ['sidang' => $data2]);
    }

    public function atur_jadwal(){
        $data1 = Prodi::all();
        $data2 = Dosen::all();
        $data3 = daftar_sidang::all();
        $data = [$data1, $data2, $data3];
        return view('atur-jadwal-sidang', ['sidang' => $data]);
    }

    //Dashboard
    public function view_mahasiswa(){
        $data = Mahasiswa::all();
        return view('view-mahasiswa', ['viewMhs' => $data]);
    }

    public function Mahasiswa()
    {
        $data1 = Prodi::all();
        $data2 = Mahasiswa::all();
        return view('mahasiswa', ['viewMhs' => $data1], ['viewMhs' => $data2]);
    }

    public function view_dosen(){
        $data = Dosen::all();
        return view('view-dosen', ['viewDsn' => $data]);
    }

    public function Dosen()
    {
        $data1 = Prodi::all();
        $data2 = Dosen::all();
        return view('dosen', ['viewDsn' => $data1], ['viewDsn' => $data2]);
    }
//END TAMPILAN

//START LOGIN & LOGOUT
    //Login
    public function login(Request $a){
        $cek = $a->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($cek)) {
            $a->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->with('loginError', 'Maaf! Gagal Login');
    }

    //Logout
    public function logout(Request $a){
        Auth::logout();
        $a->session()->invalidate();
        $a->session()->regenerateToken();
        return redirect('login');
    }
//END LOGIN & LOGOUT
}
