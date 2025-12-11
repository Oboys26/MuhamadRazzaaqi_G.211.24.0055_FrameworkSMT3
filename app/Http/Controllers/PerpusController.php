<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerpusController extends Controller
{
    // Fungsi baru untuk menampilkan form login
    public function login()
    {
        return view('perpus.login');
    }

    // Tambahkan atau modifikasi fungsi index (Dashboard)
    public function index()
    {
        // Konten dashboard
        return view('perpus.main', ['title' => 'Dashboard Perpustakaan']);
    }
}