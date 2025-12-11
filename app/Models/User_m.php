<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Menggantikan Illuminate\Database\Eloquent\Model [cite: 88]

// Jika Anda menggunakan nama file User_m.php
class User_m extends Authenticatable // Model ini mewarisi Authenticatable [cite: 6, 89]
{
    use HasFactory;

    // Properti yang disesuaikan dengan tabel 'users' Anda
    protected $table = 'users'; // Nama tabel database 
    protected $primaryKey = 'id'; // Kunci utama [cite: 114]
    public $timestamps = false; // Karena tabel Anda tidak memiliki kolom timestamps [cite: 115]

    // Kolom yang boleh diisi
    protected $fillable = [
        'username', // Kolom username [cite: 5, 117]
        'password', // Kolom password [cite: 5, 118]
    ];
}

// Catatan: Jika Anda menggunakan file User.php, ganti "class User_m" menjadi "class User".