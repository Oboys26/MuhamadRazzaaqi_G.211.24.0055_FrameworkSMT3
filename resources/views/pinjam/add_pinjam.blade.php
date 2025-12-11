@extends('layouts.app')

@section('content')
<style>
    /* -------------------------------------------
       STYLE DISESUAIKAN TEMA COKLAT – CREAM
    ------------------------------------------- */
    .container {
        margin-left: auto;
        margin-right: auto;
        padding: 1rem;
        max-width: 600px;
    }

    .bg-white {
        background-color: #ffffff;
    }

    .shadow-xl {
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .rounded-lg {
        border-radius: 0.75rem;
    }

    .p-6 {
        padding: 1.8rem;
    }

    /* Judul Form */
    h1 {
        color: #8b5e34;
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    /* Label */
    label {
        display: block;
        color: #5a4a42;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 0.4rem;
    }

    /* Input & Select */
    input[type="date"], select {
        width: 100%;
        padding: 0.55rem 0.75rem;
        border: 1px solid #d3c7bb;
        border-radius: 6px;
        color: #4b3f37;
        background: #fffdf9;
        transition: 0.25s;
    }

    input:focus, select:focus {
        outline: none;
        border-color: #8b5e34;
        box-shadow: 0 0 0 3px rgba(139, 94, 52, 0.3);
    }

    /* Error */
    .text-red-500 {
        color: #c0392b;
    }
    .text-xs {
        font-size: 0.75rem;
    }
    .mt-1 {
        margin-top: 0.25rem;
    }

    /* Tombol */
    .flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Tombol Simpan */
    button[type="submit"] {
        background-color: #28a745;
        color: white;
        font-weight: 700;
        padding: 10px 18px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        transition: 0.2s;
    }
    button[type="submit"]:hover {
        background-color: #218838;
    }

    /* Tombol Kembali */
    .btn-kembali {
        background-color: #6c757d;
        color: white;
        font-weight: 700;
        padding: 10px 18px;
        border-radius: 6px;
        text-decoration: none;
        transition: 0.2s;
        display: inline-block;
    }
    .btn-kembali:hover {
        background-color: #5a6268;
    }
</style>

<div class="container">
    <div class="bg-white shadow-xl rounded-lg p-6">
        <h1>Form Transaksi Peminjaman</h1>

        <form action="{{ url('/pinjam/save') }}" method="POST">
            @csrf

            <!-- Anggota -->
            <div class="mb-4">
                <label for="ID_Anggota">Anggota:</label>
                <select name="ID_Anggota" id="ID_Anggota"
                    class="@error('ID_Anggota') border-red-500 @enderror">
                    <option value="">-- Pilih Anggota --</option>
                    @foreach ($list_anggota as $id => $nama)
                        <option value="{{ $id }}" {{ old('ID_Anggota') == $id ? 'selected' : '' }}>
                            {{ $nama }}
                        </option>
                    @endforeach
                </select>
                @error('ID_Anggota')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buku -->
            <div class="mb-4">
                <label for="ID_Buku">Buku:</label>
                <select name="ID_Buku" id="ID_Buku"
                    class="@error('ID_Buku') border-red-500 @enderror">
                    <option value="">-- Pilih Buku --</option>
                    @foreach ($list_buku as $id => $judul)
                        <option value="{{ $id }}" {{ old('ID_Buku') == $id ? 'selected' : '' }}>
                            {{ $judul }}
                        </option>
                    @endforeach
                </select>
                @error('ID_Buku')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tgl Pinjam -->
            <div class="mb-4">
                <label for="tgl_pinjam">Tanggal Pinjam:</label>
                <input type="date" name="tgl_pinjam" id="tgl_pinjam" value="{{ old('tgl_pinjam') }}"
                    class="@error('tgl_pinjam') border-red-500 @enderror">
                @error('tgl_pinjam')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tgl Kembali -->
            <div class="mb-6">
                <label for="tgl_kembali">Tanggal Kembali:</label>
                <input type="date" name="tgl_kembali" id="tgl_kembali" value="{{ old('tgl_kembali') }}"
                    class="@error('tgl_kembali') border-red-500 @enderror">
                @error('tgl_kembali')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex">
                <button type="submit">Simpan</button>
                <a href="{{ url('/pinjam') }}" class="btn-kembali">Batal / Kembali</a>
            </div>

        </form>
    </div>
</div>
@endsection
