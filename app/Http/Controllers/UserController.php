<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm()
    {
        // If already authenticated, redirect to profile
        if (Auth::check()) {
            return redirect()->route('profile');
        }

        return view('login'); // Assuming the login view is resources/views/login.blade.php
    }

    public function login(Request $request)
    {
        // Retrieve credentials from the request
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate and redirect accordingly
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('profile');
        }

        // Redirect back to login with an error message
        return redirect()->route('login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function profile()
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

/* 
$request perlu di-injeksi sebagai parameter dalam method updateProfile untuk menangani data yang dikirimkan oleh pengguna dari formulir di frontend. Dengan cara ini, Laravel dapat secara otomatis mengumpulkan input formulir dan memvalidasi serta memproses data yang dikirimkan. Injeksi ini memungkinkan Anda untuk menggunakan data tersebut, seperti nama dan email pengguna, untuk memperbarui informasi profil mereka dalam database.

Fitur keamanan yang penting untuk ditambahkan adalah autentikasi dan otorisasi. Meskipun autentikasi sudah diterapkan dengan auth()->id(), memastikan bahwa hanya pengguna yang terautentikasi yang dapat memperbarui profil mereka sudah menjadi langkah yang baik. Anda juga harus memastikan bahwa data yang dikirimkan oleh pengguna divalidasi dengan benar untuk mencegah penyalahgunaan atau serangan seperti SQL Injection. Validasi yang ketat memastikan bahwa hanya data yang sah yang diproses dan disimpan dalam database.
*/