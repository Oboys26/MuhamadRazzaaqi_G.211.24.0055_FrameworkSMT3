<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Perpustakaan - Login</title>

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #f3e9d7; /* Cream lembut */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        h1 {
            color: #6b3e1e; /* Coklat perpustakaan */
            text-align: center;
            margin-bottom: 25px;
            font-size: 32px;
            font-weight: 700;
        }

        p[style="color: red;"] {
            background-color: rgba(255, 0, 0, 0.15);
            border-left: 4px solid #cc0000;
            padding: 12px;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 6px;
            color: #900 !important;
            font-weight: 600;
            max-width: 350px;
        }

        form {
            background: #ffffff;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
            width: 100%;
            max-width: 360px;
            box-sizing: border-box;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #6b3e1e;
            font-weight: 600;
            font-size: 15px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #c4b59e;
            border-radius: 10px;
            font-size: 16px;
            background: #fffdf8;
            transition: 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #b48a60;
            box-shadow: 0 0 8px rgba(180, 138, 96, 0.4);
            outline: none;
        }

        input[type="submit"] {
            background: #28a745; /* Sama dengan tombol SIMPAN */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: #218838;
        }
    </style>

</head>
<body>

    <h1>Silahkan Login</h1>

    @if(session()->has('loginError'))
        <p style="color: red;">{{ session('loginError') }}</p>
    @endif

    <form action="{{ url('login') }}" method="post">
        @csrf

        <label for="username">Username:</label>
        <input type="text" name="username" required />

        <label for="password">Password:</label>
        <input type="password" name="password" required />

        <input type="submit" name="btn_simpan" value="Login" />
    </form>

</body>
</html>
