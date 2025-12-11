@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2eee3;
            color: #4b3f37;
        }

        /* TOPBAR */
        .topbar {
            background-color: #8b5e34;
            padding: 17px 25px;
            color: white;
            font-size: 22px;
            font-weight: bold;
            box-shadow: 0 3px 5px rgba(0,0,0,0.1);
        }

        /* CONTAINER */
        .container-custom {
            padding: 30px;
            max-width: 1100px;
            margin: auto;
        }

        h1 {
            font-size: 30px;
            margin-bottom: 25px;
            color: #8b5e34;
        }

        /* BUTTON WRAPPER */
        .action-buttons {
            display: flex;
            gap: 12px;
            margin-bottom: 25px;
        }

        /* BUTTON STYLE */
        .btn {
            padding: 10px 17px;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-back { background-color: #6c757d; }
        .btn-back:hover { background-color: #5a6268; }

        .btn-add { background-color: #28a745; }
        .btn-add:hover { background-color: #218838; }

        /* CARD TABLE */
        .card {
            background: white;
            padding: 0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #8b5e34;
            color: white;
        }

        th {
            padding: 14px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #eee;
            font-size: 15px;
        }

        tbody tr:hover {
            background-color: #f7f3ea;
        }

        /* ACTION LINKS */
        td a {
            margin-right: 10px;
            font-weight: bold;
            text-decoration: none;
            color: #ffc107;
        }

        td a:hover {
            color: #d39e00;
        }

        button.delete-btn {
            border: none;
            background: none;
            color: #dc3545;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button.delete-btn:hover {
            color: #b52a3a;
        }

        /* PAGINATION */
        .pagination svg {
            width: 25px;
            height: 25px;
        }

        .pagination .flex {
            justify-content: center;
        }

        .pagination .hidden {
            display: none;
        }
    </style>
</head>

<body>

<div class="topbar">
    📘 Daftar Transaksi Pinjam
</div>

<div class="container-custom">

    <h1>Daftar Transaksi Pinjam</h1>

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <!-- Buttons -->
    <div class="action-buttons">
        <a href="{{ url('/') }}" class="btn btn-back">⟵ Kembali ke Dashboard</a>
        <a href="{{ url('/pinjam/add') }}" class="btn btn-add">＋ Tambah Transaksi</a>
    </div>

    <!-- TABLE -->
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Anggota</th>
                    <th>Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($data as $row)
                    <tr>
                        <td>{{ $row->ID_Pinjam }}</td>
                        <td>{{ $row->NamaAnggota }}</td>
                        <td>{{ $row->JudulBuku }}</td>
                        <td>{{ $row->tgl_pinjam }}</td>
                        <td>{{ $row->tgl_kembali }}</td>

                        <td>
                            <a href="{{ url('/pinjam/edit/' . $row->ID_Pinjam) }}" class="edit">Edit</a>

                            <form action="{{ url('/pinjam/delete/' . $row->ID_Pinjam) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="delete-btn"
                                        onclick="return confirm('Hapus transaksi ini?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;">Tidak ada data peminjaman.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div style="margin-top:20px;">
        {{ $data->links() }}
    </div>

</div>

</body>
</html>
@endsection
