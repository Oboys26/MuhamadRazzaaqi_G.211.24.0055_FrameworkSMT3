<!DOCTYPE html>
<html>
<head>
    <title>Edit Anggota</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('https://i.imgur.com/0ZfLQ6v.jpeg'); /* background kayu */
            background-size: cover;
            background-attachment: fixed;
            color: #333;
            margin: 0;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 520px;
            backdrop-filter: blur(3px);
            position: relative;
        }

        /* Header dengan rak buku */
        h1 {
            text-align: center;
            font-size: 26px;
            margin-bottom: 35px;
            padding-top: 90px;
            background-image: url('https://img.icons8.com/?size=512&id=59800&format=png');
            background-repeat: no-repeat;
            background-position: center top;
            background-size: 80px;
            color: #5b3a1e;
            font-weight: bold;
            text-shadow: 1px 1px 0px #fff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #4b2e16;
        }

        input[type="text"], select {
            width: 100%;
            padding: 12px;
            border: 1px solid #bfa88c;
            border-radius: 6px;
            background: #fff7ec;
            font-size: 16px;
        }

        input[type="text"]:focus, select:focus {
            outline: none;
            border-color: #8b5a2b;
            box-shadow: 0 0 5px rgba(139, 90, 43, 0.5);
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        input[type="submit"], .btn-kembali {
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        input[name="btn_simpan"] {
            background-color: #8b5a2b;
            color: white;
            flex-grow: 1;
        }

        input[name="btn_simpan"]:hover {
            background-color: #6d441f;
        }

        .btn-kembali {
            background-color: #bfa88c;
            color: white;
            flex-grow: 1;
        }

        .btn-kembali:hover {
            background-color: #9c8a71;
        }
    </style>
</head>
<body>
    <form action="{{ url('anggota/save') }}" method="post">
        @csrf

        <h1>Edit Anggota</h1>

        <input type="hidden" name="id" value="{{ $query->ID_Anggota ?? '' }}">
        <input type="hidden" name="is_update" value="1">

        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="{{ old('nim', $query->nim ?? '') }}" maxlength="13" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $query->nama ?? '') }}" maxlength="30" required>
        </div>

        <div class="form-group">
            <label for="progdi">Progdi:</label>
            <select id="progdi" name="progdi" required>
                <option value="" @if(old('progdi', $query->progdi ?? '')=='') selected @endif>- Pilih Program Studi -</option>
                @foreach($optprogdi as $key => $value)
                    <option value="{{ $key }}" @if(old('progdi', $query->progdi ?? '')==$key) selected @endif>{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="button-group">
            <input type="submit" name="btn_simpan" value="Simpan Perubahan">
            <a href="{{ url('/anggota') }}" class="btn-kembali">Kembali</a>
        </div>
    </form>
</body>
</html>