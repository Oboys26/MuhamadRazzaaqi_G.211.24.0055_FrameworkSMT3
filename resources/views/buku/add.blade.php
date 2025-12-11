<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku Baru</title>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2eee3;
            color: #4b3f37;

            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 25px;
        }

        /* CARD FORM */
        .form-card {
            background: #ffffff;
            width: 100%;
            max-width: 550px;
            padding: 40px 45px;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* TITLE */
        h1 {
            text-align: center;
            color: #8b5e34;
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: 700;
        }

        /* ERROR MESSAGE */
        .error-container ul {
            background: #ffe2e2;
            padding: 15px 20px;
            border-left: 5px solid #d9534f;
            border-radius: 6px;
            margin-bottom: 25px;
            list-style: none;
            color: #b52a3a;
            font-size: 15px;
        }

        /* FORM GROUP */
        .form-group {
            margin-bottom: 22px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #5f4936;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 12px 13px;
            border-radius: 6px;
            border: 1px solid #c7b8a8;
            background: #faf8f5;
            font-size: 15px;
            transition: 0.3s;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #8b5e34;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(139, 94, 52, 0.25);
            outline: none;
        }

        /* BUTTON GROUP */
        .button-group {
            margin-top: 30px;
            display: flex;
            gap: 12px;
        }

        /* BUTTON STYLE */
        .btn {
            flex: 1;
            padding: 13px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: 0.3s;
            text-align: center;
        }

        /* SIMPAN */
        .btn-save {
            background: #28a745;
            color: white;
        }
        .btn-save:hover {
            background: #218838;
        }

        /* KEMBALI */
        .btn-back {
            background: #6c757d;
            color: white;
        }
        .btn-back:hover {
            background: #5a6268;
        }
    </style>
</head>

<body>

    <div class="form-card">

        {{-- ERROR MESSAGE --}}
        @if ($errors->any())
            <div class="error-container">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('buku/save') }}" method="POST">
            @csrf

            <h1>Tambah Buku Baru</h1>

            <input type="hidden" name="id" value="">
            <input type="hidden" name="is_update" value="{{ $is_update }}">

            {{-- Judul --}}
            <div class="form-group">
                <label for="Judul">Judul Buku</label>
                <input type="text" id="Judul" name="Judul" value="{{ old('Judul') }}" maxlength="100">
            </div>

            {{-- Pengarang --}}
            <div class="form-group">
                <label for="Pengarang">Pengarang</label>
                <input type="text" id="Pengarang" name="Pengarang" value="{{ old('Pengarang') }}" maxlength="150">
            </div>

            {{-- Kategori --}}
            <div class="form-group">
                <label for="Kategori">Kategori</label>
                <select name="Kategori" id="Kategori">
                    <option value="" @if(old('Kategori')=='') selected @endif>
                        - Pilih kategori -
                    </option>

                    @foreach($optkategori as $key => $label)
                        <option value="{{ $key }}" @if(old('Kategori') == $key) selected @endif>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-save">Simpan</button>
                <a href="{{ url('buku') }}" class="btn btn-back">Kembali</a>
            </div>

        </form>
    </div>

</body>
</html>
