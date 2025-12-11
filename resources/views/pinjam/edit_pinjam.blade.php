@extends('layouts.app')

@section('content')

<style>
    .form-card {
        max-width: 600px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        text-align: left;
    }

    h2 {
        text-align: center;
        font-size: 26px;
        font-weight: 700;
        color: #6b3e1e;
        margin-bottom: 25px;
    }

    label {
        font-weight: 600;
        color: #6b3e1e;
        margin-bottom: 6px;
        display: block;
    }

    select, input[type="date"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #d1d1d1;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .btn-submit {
        background: #28a745;
        color: white;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: bold;
        border: none;
    }

    .btn-submit:hover {
        background: #1e7e34;
    }

    .btn-back {
        background: #6c757d;
        color: white;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: bold;
        text-decoration: none;
        border: none;
    }

    .btn-back:hover {
        background: #5a6268;
    }

    .button-row {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
</style>

<div class="form-card">

    <h2>Form Transaksi Peminjaman</h2>

    <form action="{{ url('/pinjam/update/' . $data_pinjam->ID_Pinjam) }}" method="POST">
        @csrf

        <label>Anggota:</label>
        <select name="ID_Anggota">
            <option value="">-- Pilih Anggota --</option>
            @foreach ($list_anggota as $id => $nama)
                <option value="{{ $id }}"
                    {{ old('ID_Anggota', $data_pinjam->ID_Anggota) == $id ? 'selected' : '' }}>
                    {{ $nama }}
                </option>
            @endforeach
        </select>

        <label>Buku:</label>
        <select name="ID_Buku">
            <option value="">-- Pilih Buku --</option>
            @foreach ($list_buku as $id => $judul)
                <option value="{{ $id }}"
                    {{ old('ID_Buku', $data_pinjam->ID_Buku) == $id ? 'selected' : '' }}>
                    {{ $judul }}
                </option>
            @endforeach
        </select>

        <label>Tanggal Pinjam:</label>
        <input type="date" name="tgl_pinjam" 
               value="{{ old('tgl_pinjam', $data_pinjam->tgl_pinjam) }}">

        <label>Tanggal Kembali:</label>
        <input type="date" name="tgl_kembali" 
               value="{{ old('tgl_kembali', $data_pinjam->tgl_kembali) }}">

        <div class="button-row">
            <button type="submit" class="btn-submit">Simpan</button>
            <a href="{{ url('/pinjam') }}" class="btn-back">Batal / Kembali</a>
        </div>

    </form>

</div>

@endsection
