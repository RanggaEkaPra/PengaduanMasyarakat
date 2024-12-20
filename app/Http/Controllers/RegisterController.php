<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function tampil(){
        return view('register');
    }
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|digits:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);


        // Simpan ke database
        $user = new User();
        $user->name = $validatedData['name'];
        $user->nik= $validatedData['nik'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']); // Enkripsi password
        $user->save();

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');;
    }
}
