<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check() && Auth::user()->username) {
            return back();
        }
        return view('auth.login');
    }

    public function authCheck(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username tidak boleh kosong.',
            'password.required' => 'Password tidak boleh kosong.'
        ]);

        if (Auth::attempt($credentials)) {
            User::where('username', Auth::user()->username)->increment('total_login');
            $request->session()->regenerate();
            return redirect()->intended('/halaman-dashboard');
        }
        return redirect()->route('login')->with('error', 'Username atau password salah. Silahkan coba lagi.');
    }
    
    public function logout()
    {
        User::where('username', Auth::user()->username)->update(['terakhir_login' => now()]);
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
