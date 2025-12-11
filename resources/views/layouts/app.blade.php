<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan FTIK USM</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f2eee3;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #4b3f37;
        }

        /* HEADER */
        .header {
            background-color: #8b5e34;
            color: white;
            padding: 22px 20px;
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            box-shadow: 0 3px 6px rgba(0,0,0,0.2);
        }

        /* NAV MENU */
        .nav-menu {
            background-color: #a47148;
            padding: 14px 0;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }

        .nav-menu a {
            color: white;
            padding: 12px 18px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            border-radius: 6px;
            margin: 0 5px;
            transition: 0.3s;
        }

        .nav-menu a:hover {
            background-color: #8b5e34;
        }

        /* CONTAINER */
        .container {
            width: 85%;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 5px 12px rgba(0,0,0,0.1);
        }

        /* FOOTER */
        .footer {
            text-align: center;
            padding: 14px;
            margin-top: 25px;
            background-color: #e6ddcf;
            color: #4b3f37;
            border-top: 1px solid #d1c7bb;
            font-size: 0.9em;
        }
    </style>
</head>

<body>

    <div class="header">
        📚 Aplikasi Perpustakaan FTIK USM
    </div>

    <div class="nav-menu">
        <a href="{{ url('/') }}">🏠 Home</a>
        <a href="{{ url('/buku') }}">📘 Kelola Buku</a>
        <a href="{{ url('/anggota') }}">👥 Kelola Anggota</a>
        <a href="{{ url('/pinjam') }}">🔖 Transaksi Pinjam</a>
    </div>

    <div class="container">
        <div class="content">
            @yield('content')
        </div>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} FTIK USM. All Rights Reserved.
    </div>

</body>
</html>
