<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $loginInput = $credentials['login'];
        $password = $credentials['password'];

        // Cek login admin (username)
        $admin = \App\Models\User::where('username', $loginInput)->where('role', 'admin')->first();
        if ($admin) {
            if (Auth::attempt(['username' => $loginInput, 'password' => $password])) {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            }
        }

        // Cek login siswa (NIS)
        $siswa = \App\Models\Siswa::where('nis', $loginInput)->with('user')->first();
        if ($siswa && $siswa->user) {
            if (Auth::attempt(['username' => $siswa->user->username, 'password' => $password])) {
                $request->session()->regenerate();
                return redirect()->route('siswa.dashboard');
            }
        }

        // Cek login guru (NIP)
        $guru = \App\Models\Guru::where('nip', $loginInput)->with('user')->first();
        if ($guru && $guru->user) {
            if (Auth::attempt(['username' => $guru->user->username, 'password' => $password])) {
                $request->session()->regenerate();
                
                // Redirect berdasarkan tipe guru
                if ($guru->type === 'wali_kelas') {
                    return redirect()->route('wali.dashboard');
                } elseif ($guru->type === 'kakomsli') {
                    return redirect()->route('kakomsli.dashboard');
                } elseif ($guru->type === 'kaprog_pplg') {
                    return redirect()->route('kaprog_pplg.dashboard');
                } else {
                    return redirect()->route('guru.dashboard');
                }
            }
        }

        return back()->withErrors(['login' => 'Login gagal, cek Username/NIS/NIP dan password!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

