<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Anggota</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4eddb;
        }

        /* HEADER */
        .header {
            background-color: #8b5a2b;
            padding: 18px 40px;
            color: white;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 22px;
            font-weight: bold;
        }

        .header img {
            height: 40px;
        }

        /* BUTTON */
        .btn-back, .btn-add {
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-back {
            background-color: #6c757d;
            color: white;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }

        .btn-add {
            background-color: #28a745;
            color: white;
        }
        .btn-add:hover {
            background-color: #218838;
        }

        /* MAIN WRAPPER */
        .container {
            padding: 40px;
        }

        h1 {
            font-size: 26px;
            color: #5a3b1e;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* TABEL */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        thead th {
            background-color: #8b5a2b;
            color: white;
            padding: 14px;
            text-align: left;
        }

        tbody td {
            padding: 12px 14px;
            border-bottom: 1px solid #e2d3c1;
        }

        tbody tr:nth-child(even) {
            background-color: #f7ebd8;
        }

        tbody tr:hover {
            background-color: #e8dcc7;
        }

        td:last-child {
            white-space: nowrap;
        }

        /* ACTION LINK */
        td a[href*="edit"] {
            color: #e6a700;
            font-weight: bold;
            margin-right: 12px;
            text-decoration: none;
        }
        td a[href*="edit"]:hover {
            color: #ca8f00;
        }

        td button {
            color: #dc3545;
            background: none;
            border: none;
            font-weight: bold;
            cursor: pointer;
            padding: 6px 8px;
        }

        td button:hover {
            color: #b52a34;
        }

        /* PAGINATION */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 25px;
            list-style: none;
            padding: 0;
            gap: 6px;
        }

        .pagination li a,
        .pagination li span {
            padding: 8px 12px;
            border-radius: 5px;
            border: 1px solid #8b5a2b;
            color: #8b5a2b;
            background: white;
            font-size: 14px;
        }

        .pagination li a:hover {
            background-color: #8b5a2b;
            color: white;
        }

        .pagination .active span {
            background-color: #8b5a2b;
            color: white;
        }

        .pagination .disabled span {
            background-color: #e2d5c4;
            color: #7b6a5a;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        <img src="/static/icons/member.png">
        Daftar Anggota Perpustakaan
    </div>

    <div class="container">

        <h1>Daftar Anggota</h1>

        <div>
            <a href="{{ url('/') }}">
                <button class="btn-back">← Kembali ke Dashboard</button>
            </a>

            <a href="{{ url('/anggota/add') }}">
                <button class="btn-add">+ Tambah Anggota</button>
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Progdi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @php $no = $query->firstItem() - 1; @endphp
                @foreach($query as $row)
                @php $no++; @endphp

                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $row->nim }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $optprogdi[$row->progdi] ?? '-' }}</td>

                    <td>
                        <a href="{{ url('anggota/edit/'.$row->ID_Anggota) }}">Edit</a>

                        <form action="{{ url('anggota/delete/'.$row->ID_Anggota) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin menghapus anggota ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>

        <div>
            {{ $query->links() }}
        </div>

    </div>

</body>
</html>
