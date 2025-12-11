<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Anggota Baru</title>

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

        /* FORM WRAPPER */
        .wrapper {
            display: flex;
            justify-content: center;
            padding: 40px;
        }

        form {
            width: 100%;
            max-width: 500px;
            background: #fff9f0;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        h1 {
            color: #8b5a2b;
            text-align: center;
            margin-bottom: 25px;
            font-size: 24px;
        }

        /* ERROR BOX */
        .error-container ul {
            background-color: #ffe5e5;
            border: 1px solid #ff4d4d;
            padding: 14px;
            border-radius: 6px;
            color: #cc0000;
            list-style: none;
            margin-bottom: 20px;
        }

        /* FORM INPUT */
        .form-group {
            margin-bottom: 18px;
        }

        label {
            font-weight: bold;
            color: #5a3b1e;
            margin-bottom: 6px;
            display: block;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 11px;
            border-radius: 6px;
            border: 1px solid #c8b8a8;
            font-size: 15px;
            background-color: #fffdf8;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #8b5a2b;
            box-shadow: 0 0 0 3px rgba(139, 90, 43, 0.25);
            outline: none;
        }

        /* BUTTON GROUP */
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        input[type="submit"] {
            flex: 1;
            padding: 12px;
            border-radius: 8px;
            border: none;
            background-color: #28a745;
            color: white;
            font-weight: bold;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .btn-kembali {
            flex: 1;
            background-color: #6c757d;
            color: white;
            text-align: center;
            padding: 12px;
            border-radius: 8px;
            display: inline-block;
            font-weight: bold;
            text-decoration: none;
            font-size: 16px;
        }

        .btn-kembali:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <div class="header">
        <img src="/static/icons/member.png">
        Tambah Anggota Baru
    </div>

    <div class="wrapper">

        <form action="{{ url('anggota/save') }}" method="post">
            @csrf

            <h1>Form Tambah Anggota</h1>

            {{-- ERROR VALIDATION --}}
            @if ($errors->any())
                <div class="error-container">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <input type="hidden" name="is_update" value="0">

            <!-- INPUT NAMA -->
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" maxlength="30">
            </div>

            <!-- INPUT NIM -->
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" value="{{ old('nim') }}" maxlength="13">
            </div>

            <!-- SELECT PROGDI -->
            <div class="form-group">
                <label for="progdi">Program Studi:</label>
                <select id="progdi" name="progdi">
                    <option value="">- Pilih Program Studi -</option>
                    @foreach ($optprogdi as $key => $value)
                        <option value="{{ $key }}" {{ old('progdi') == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- TOMBOL -->
            <div class="button-group">
                <input type="submit" value="Simpan">
                <a href="{{ url('/anggota') }}" class="btn-kembali">Kembali</a>
            </div>

        </form>

    </div>

</body>
</html>
