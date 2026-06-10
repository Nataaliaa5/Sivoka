<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIVOKA PNC</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background-color: #BCDCF1;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: white;
            width: 750px;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo i {
            font-size: 55px;
            color: #5b9bd5;
        }

        .logo h1 {
            margin-top: 10px;
            color: #1b3556;
            font-size: 35px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 18px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #7aaed6;
            background-color: #d9ecfa;
            font-size: 16px;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #7fc3f3;
            border: none;
            border-radius: 10px;
            font-size: 22px;
            font-weight: bold;
            color: #1b3556;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-login:hover {
            background-color: #5faee7;
            transition: 0.3s;
        }

        .register {
            text-align: center;
            margin-top: 20px;
        }

        .register a {
            color: #2196f3;
            text-decoration: none;
            font-weight: bold;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <div class="login-container">

        <div class="logo">
            <i class="bi bi-person-circle"></i>
            <h1>SIVOKA PNC</h1>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Email</label>

                <input type="email" name="email" value="{{ old('email') }}" required autofocus>

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nama</label>

                <input type="text" name="name" required>

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>

                <input type="password" name="password" required>

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>

                <input type="password" name="password_confirmation" required>

                @error('konfirmasipassword')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-login">
                BUAT AKUN
            </button>

            <div class="register">
                Kembali ke halaman
                <a href="{{ route('login') }}">
                    Login
                </a>
            </div>

        </form>

    </div>

</body>

</html>