<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Fasad Auth

class LoginController extends Controller
{
    /**
     * Menangani permintaan otentikasi (Login).
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            // Pastikan Anda menggunakan 'username' dan 'password' sesuai kolom di database
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Secara default, Auth::attempt mencoba otentikasi menggunakan 'email' dan 'password'.
        // Kita perlu memberitahu Laravel untuk menggunakan 'username'.
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            
            // Otentikasi berhasil
            $request->session()->regenerate();

            // Redirect ke rute yang dituju (didefinisikan di RouteServiceProvider)
            return redirect()->intended('/perpus');
        }

        // Otentikasi gagal, kembali ke halaman login dengan pesan error
        return back()->withInput()->withErrors([
            'username' => 'Username atau password yang Anda masukkan salah!',
        ]);
    }

    /**
     * Menangani permintaan logout.
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Logout pengguna

        $request->session()->invalidate(); // Hapus sesi
        $request->session()->regenerateToken(); // Buat token baru

        // Redirect ke halaman login setelah logout
        return redirect()->route('login'); 
    }
}