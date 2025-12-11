<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\infoController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\LoginController;

// --- RUTE AUTENTIKASI ---
// 1. Rute untuk menampilkan form login (GET)
Route::get('/login', [PerpusController::class, 'login'])->name('login')->middleware('guest');

// 2. Rute untuk memproses form login (POST)
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

// 3. Rute untuk proses logout (GET)
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth'); 

// 4. Rute Dashboard (Redirect Utama)
Route::get('/', function () {
    return redirect('perpus');
})->middleware('auth');

// --- RUTE PERPUS (DILINDUNGI) ---
Route::get('/perpus', [PerpusController::class, 'index'])->middleware('auth');

// --- RUTE CRUD BUKU (DILINDUNGI) ---
Route::middleware(['auth'])->group(function () {
    Route::get('/buku', [BukuController::class, 'index']);
    Route::get('/buku/add', [BukuController::class, 'add_new']);
    Route::post('/buku/save', [BukuController::class, 'save']);
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
    Route::post('/buku/update/{id}', [BukuController::class, 'update']); 
    // PERBAIKAN: Mengganti Route::get menjadi Route::delete
    Route::delete('/buku/delete/{id}', [BukuController::class, 'delete']);
});


// --- RUTE CRUD ANGGOTA (DILINDUNGI) ---
Route::middleware(['auth'])->group(function () {
    Route::get('/anggota', [AnggotaController::class, 'index']);
    Route::get('/anggota/add', [AnggotaController::class, 'add']);
    Route::post('/anggota/save', [AnggotaController::class, 'save']);
    Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit']);
    Route::post('/anggota/update/{id}', [AnggotaController::class, 'update']); 
    // PERBAIKAN: Mengganti Route::get menjadi Route::delete
    Route::delete('/anggota/delete/{id}', [AnggotaController::class, 'delete']);
});

// --- RUTE CRUD PINJAM (DILINDUNGI) ---
Route::middleware(['auth'])->group(function () {
    Route::get('/pinjam', [PinjamController::class, 'index']);
    Route::get('/pinjam/add', [PinjamController::class, 'add']);
    Route::post('/pinjam/save', [PinjamController::class, 'save']);
    Route::get('/pinjam/edit/{id}', [PinjamController::class, 'edit']);
    Route::post('/pinjam/update/{id}', [PinjamController::class, 'update']); 
    // PERBAIKAN: Mengganti Route::get menjadi Route::delete
    Route::delete('/pinjam/delete/{id}', [PinjamController::class, 'delete']);
});
        
// --- RUTE DASAR (TIDAK TERLINDUNGI) ---
Route::get('/ftik', function () {
    return view('ftik');
});

Route::get('/info', function(){
    return view('/info',['progdi'=>'TI']);
});

Route::get('/info/{kd}', [infoController::class, 'infoMhs']);