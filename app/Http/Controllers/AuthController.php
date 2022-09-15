<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Login
    public function view_login(){
        return view('login_register/login');
    }

    public function login(Request $a){
        $cek = $a->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($cek)) {
            $a->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->with('loginError', 'Maaf! Gagal Login');
    }
    

    //Register
    public function view_register(){
        return view('login_register/register');
    }

    public function register(Request $a)
    {
        $messages = [
            'required' => 'Data harus diisi!',
            'username' => 'Alamat username tidak valid',
        ];

        $cekvalidasi = $a->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
        ], $messages);

        User::create([
            'name' => $a->name,
            'username' => $a->username,
            'password' => Hash::make($a->password),
            'level' => $a->level,
        ], $cekvalidasi);
        return redirect('/login')->with('Berhasil', 'Akun berhasil dibuat!');
    }

    //Logout
    public function logout(Request $a){
        Auth::logout();
        $a->session()->invalidate();
        $a->session()->regenerateToken();
        return redirect('login');
    }
}
