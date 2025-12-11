<!DOCTYPE html>
<html>
<head><title>Aplikasi Perpustakaan FTIK USM</title></head>
<body>
    <h1>Aplikasi Perpustakaan FTIK USM</h1>
    <h2>Pilihan Menu:</h2>
    <ol>
        <li><a href="{{ url('/buku') }}">Kelola Data Buku</a></li>
        <li><a href="{{ url('/anggota') }}">Kelola Data Anggota</a></li>
        {{-- MENU BARU UNTUK MODUL 5 --}}
        <li><a href="{{ url('/pinjam') }}">Transaksi Pinjam</a></li>
    </ol>
</body>
</html>