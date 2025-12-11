<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>

    <style>
        body {
            font-family: 'Georgia', serif;
            background: url('https://i.imgur.com/Z9eUQpO.jpeg');
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Kartu Form */
        form {
            background: rgba(255, 248, 235, 0.92);
            padding: 40px;
            border-radius: 12px;
            max-width: 550px;
            width: 100%;
            box-shadow: 0 6px 18px rgba(0,0,0,0.3);
            border: 3px solid #b3894d;
            position: relative;
        }

        /* Header dengan ilustrasi rak buku */
        .header {
            background-image: url('https://img.icons8.com/?size=512&id=59800&format=png');
            background-repeat: no-repeat;
            background-position: center top;
            background-size: 120px;
            padding-top: 130px;
            margin-bottom: 25px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            color: #5a3b1e;
            text-shadow: 1px 1px 1px #d2b48c;
            font-weight: bold;
        }

        /* Input dan Select */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #5a3b1e;
            font-size: 17px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 12px;
            border: 2px solid #c9a066;
            border-radius: 8px;
            background: #fff8e7;
            font-size: 16px;
            transition: 0.3s;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #8a5c2e;
            box-shadow: 0 0 8px rgba(138,92,46,0.4);
            outline: none;
        }

        /* Tombol */
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        input[type="submit"], .btn-kembali {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            color: white;
        }

        input[name="btn_simpan"] {
            background-color: #4f772d;
        }
        input[name="btn_simpan"]:hover {
            background-color: #355e1a;
        }

        .btn-kembali {
            background-color: #8b5e34;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }
        .btn-kembali:hover {
            background-color: #6d4826;
        }
    </style>
</head>

<body>

    <form action="{{ url('buku/save') }}" method="post">
        @csrf

        <div class="header">
            <h1>Edit Buku</h1>
        </div>

        <input type="hidden" name="id" value="{{ $query->ID_Buku ?? '' }}" />
        <input type="hidden" name="is_update" value="{{ $is_update ?? 0 }}" />

        <div class="form-group">
            <label for="Judul">Judul Buku</label>
            <input type="text" name="Judul" id="Judul" value="{{ old('Judul', $query->Judul ?? '') }}" maxlength="100">
        </div>

        <div class="form-group">
            <label for="Pengarang">Pengarang</label>
            <input type="text" name="Pengarang" id="Pengarang" value="{{ old('Pengarang', $query->Pengarang ?? '') }}" maxlength="150">
        </div>

        <div class="form-group">
            <label for="Kategori">Kategori</label>
            <select name="Kategori" id="Kategori">
                <option value="">- Pilih kategori -</option>
                @foreach($optkategori as $key => $value)
                    <option value="{{ $key }}" 
                        @if(old('Kategori', $query->Kategori ?? '') == $key) selected @endif>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="button-group">
            <input type="submit" name="btn_simpan" value="Simpan">
            <a href="{{ url('buku') }}" class="btn-kembali">Kembali</a>
        </div>

    </form>

</body>
</html>
