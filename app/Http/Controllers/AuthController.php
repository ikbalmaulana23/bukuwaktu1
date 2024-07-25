<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }
    public function login(LoginRequest $r)
    {

        if ($r->validated()) {
            if (Auth::guard('web')->attempt([
                'email' => $r->email,
                'password' => $r->password
            ])) {
                return redirect('/dashboard')->with('pesan', 'berhasil login');
            } else {
                return back()->with('pesan', 'login gagal');
            }
        }
    }



    public function daftar()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $r)
    {
        if ($r->validated()) {
            User::create([
                'name' => $r->name,
                'username' => $r->username,
                'email' => $r->email,
                'password' => Hash::make($r->password)

            ]);

            return redirect('login')->with('pesan', 'registrasi berhasil');
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
