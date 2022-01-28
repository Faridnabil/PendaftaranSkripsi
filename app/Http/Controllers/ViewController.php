<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Pengajuan;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    //START TAMPILAN
    //Dashboard
    public function dashboard(){
        $data1 = Mahasiswa::with('prodi','user')->paginate(5);
        $data2 = Dosen::with('prodi')->paginate(5);
        return view('dashboard', ['viewDsn' => $data2], ['viewMhs' => $data1]);
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

    public function status_pengajuan(){
        $data = Pengajuan::all();
        return view('daftar-pengajuan', ['viewMhs' => $data]);
    }

    //Dashboard
    public function Mahasiswa()
    {
        $data1 = Prodi::all();
        $data2 = User::all();
        return view('mahasiswa', ['viewMhs' => $data1], ['viewMhs' => $data2]);
    }

    public function Dosen()
    {
        $data = Prodi::all();
        return view('dosen', ['viewDsn' => $data]);
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
