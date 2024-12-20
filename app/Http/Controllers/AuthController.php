<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function index(){
    //     return view('login');
    // }
    public function showLoginForm()
    {
        return view('login'); // Halaman login
    }
    public function explore()
    {
        return view('explore'); // Halaman login
    }

    // public function showLoginForm()
    // {
    //     return view('login'); // Halaman login
    // }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'login_identifier' => 'required|string',
            'password' => 'required',
        ]);
        $loginType = filter_var($request->login_identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'nik';
        $credentials = [
            $loginType => $request->login_identifier,
            'password' => $request->password,
        ];
        // Cek kredensial
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerasi sesi

            if (Auth::user()->role == "admin"){
                return redirect()->intended('/dashboard_admin'); // Redirect ke dashboard
            }
            return redirect()->intended('/dashboard');; // Redirect ke dashboard
        }
        // Auth::user()->update($validatedData);
        // Jika gagal login
        return back()->withErrors([
            'login_identifier' => 'Email atau NIK dan password salah.',
        ]);
        
    }
    public function logout(Request $request)
    {
        // Proses logout
        Auth::logout();

        // Hapus session pengguna
        $request->session()->invalidate();

        // Regenerasi sesi untuk memastikan keamanan
        $request->session()->regenerateToken();

        // Redirect ke halaman login setelah logout
        return redirect('/login');
    }
}
