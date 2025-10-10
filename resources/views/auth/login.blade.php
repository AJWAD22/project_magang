<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Login</title>

    <style>
        /* SALIN SEMUA CSS ANDA DI SINI */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        body {
            background-color: #5d8bc7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            animation: fadeInBg 1.5s ease-out;
        }

        @keyframes fadeInBg {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .login-container {
            width: 400px;
            background: url('{{ asset("img/gedung-pemko.jpg") }}') no-repeat center center;
            background-size: cover;
            border-radius: 20px;
            padding: 40px 30px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.1);
            opacity: 0;
            transform: translateY(30px);
            animation: slideUp 0.8s ease-out forwards;
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            margin-bottom: 25px;
        }

        .input-label {
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
            text-align: center;
            opacity: 0.9;
        }

        input[type="text"],
input[type="email"],   /* 👈 Tambahkan ini */
input[type="password"] {
    width: 100%;
    padding: 12px 15px;
    background: white;
    border: none;
    border-bottom: 2px solid #fff;
    color: black;
    font-size: 16px;
    outline: none;
    transition: all 0.3s ease;
}


        .btn-login {
            width: 100%;
            padding: 12px;
            background: white;
            color: #333;
            border: none;
            border-radius: 25px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .btn-login:hover {
            background: #f0f0f0;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
            color: #222;
        }

        .error {
            color: #ff6b6b;
            font-size: 14px;
            margin-top: 5px;
            text-align: center;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: inherit;
            background-size: 110% auto;
            z-index: -1;
            animation: zoomIn 10s linear infinite;
        }


        @media (max-width: 480px) {
            .login-container {
                width: 90%;
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="input-label">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="input-label">Password</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
</body>
</html>