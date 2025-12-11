<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Aplikasi Perpustakaan</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4efe4;
            margin: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* ---------- SIDEBAR ---------- */
        .sidebar {
            width: 260px;
            background-color: #8b5e34;
            color: white;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            gap: 25px;
            box-shadow: 4px 0 10px rgba(0,0,0,0.15);
        }

        .sidebar h2 {
            margin: 0;
            font-size: 22px;
            font-weight: bold;
            border-bottom: 2px solid rgba(255,255,255,0.4);
            padding-bottom: 10px;
        }

        .menu-item {
            background-color: #d5c1a2;
            color: #3a2d1a;
            padding: 14px 18px;
            border-radius: 10px;
            font-weight: bold;
            text-decoration: none;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: 0.25s;
        }

        .menu-item:hover {
            background-color: #f1e1c6;
            transform: translateX(6px);
        }

        /* ---------- HEADER + MAIN CONTENT ---------- */
        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .header {
            background-color: #8b5e34;
            color: white;
            padding: 20px 40px;
            font-size: 26px;
            font-weight: bold;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header img {
            height: 55px;
            position: absolute;
            left: 40px;
        }

        .header-title {
            margin-left: 100px;
        }

        .logout-btn {
            background-color: #f3e4d2;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background-color: #e6d2ba;
        }

        /* ---------- MAIN CONTENT ---------- */
        .main-content {
            padding: 40px;
            text-align: center;
        }

        .main-content h2 {
            font-size: 26px;
            margin-bottom: 10px;
            color: #5a3d20;
        }

        .main-content p {
            color: #6b542f;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>📚 Menu Perpustakaan</h2>

        <a href="{{ url('buku') }}" class="menu-item">📗 Kelola Data Buku</a>
        <a href="{{ url('anggota') }}" class="menu-item">🧑‍🤝‍🧑 Kelola Data Anggota</a>
        <a href="{{ url('pinjam') }}" class="menu-item">📘 Kelola Transaksi Pinjam</a>
    </div>

    <!-- HEADER + MAIN CONTENT -->
    <div class="content-wrapper">

        <div class="header">
            <img src="https://cdn-icons-png.flaticon.com/512/2991/2991148.png" alt="bookshelf">

            <span class="header-title">Selamat Datang di Dashboard Perpustakaan</span>

            <button class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </button>

            <form id="logout-form" action="{{ url('logout') }}" method="GET" style="display: none;">
                @csrf
            </form>
        </div>

        <div class="main-content">
            <h2>Menu Utama Perpustakaan</h2>
            <p>Silakan pilih menu di sebelah kiri untuk mengelola data perpustakaan Anda.</p>
            <p><strong>📚 Kelola Data Buku</strong> – Mengelola daftar buku, menambah buku baru, mengedit data, dan menghapus buku.</p>
            <p><strong>🧑‍🤝‍🧑 Kelola Data Anggota</strong> – Mengatur informasi anggota perpustakaan, termasuk pendaftaran dan pembaruan data anggota.</p>
            <p><strong>📘 Kelola Transaksi Pinjam</strong> – Mencatat peminjaman dan pengembalian buku oleh para anggota.</p>

        </div>

    </div>

</body>
</html>
