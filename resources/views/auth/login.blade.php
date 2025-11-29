@extends('layouts.auth')

@section('content')
    <style>
        body {
            background: radial-gradient(circle at top left, #184c9c 0%, #0d2e6e 40%, #09255c 100%);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            background: #fff;
            width: 950px;
            border-radius: 25px;
            display: flex;
            overflow: hidden;
            margin: 60px auto;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.25);
            animation: fadeInUp 0.7s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-left {
            flex: 1;
            padding: 60px 55px;
            background: #fff;
        }

        .login-right {
            flex: 1;
            background: linear-gradient(145deg, #0e3382 0%, #133E87 50%, #09255c 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .login-right::before {
            content: "";
            position: absolute;
            top: 0;
            left: -50px;
            width: 80px;
            height: 100%;
            background: linear-gradient(to right, rgba(255, 255, 255, 0.25), transparent);
            filter: blur(8px);
        }

        .login-right img {
            width: 85%;
            max-width: 420px;
            filter: drop-shadow(0 15px 25px rgba(0, 0, 0, 0.35));
            transition: transform 0.4s ease, filter 0.4s ease;
        }

        .login-right img:hover {
            transform: scale(1.05);
            filter: drop-shadow(0 25px 35px rgba(0, 0, 0, 0.45));
        }

        .login-title {
            font-weight: 600;
            font-size: 24px;
            margin-bottom: 10px;
            color: #000;
            letter-spacing: 0.3px;
        }

        .login-subtitle {
            color: #777;
            font-weight: 400;
            font-size: 15px;
            margin-bottom: 35px;
        }

        label.form-label {
            font-weight: 500;
            font-size: 15px;
            margin-bottom: 6px;
            color: #333;
        }

        .form-control {
            border-radius: 12px;
            height: 48px;
            padding-left: 20px;
            font-size: 15px;
            letter-spacing: 0.3px;
        }

        .input-group-text {
            position: absolute;
            left: 15px;
            top: 12px;
            border: none;
            background: transparent;
            color: #777;
        }

        .btn-login {
            background-color: #133E87;
            border: none;
            height: 48px;
            font-weight: 500;
            font-size: 16px;
            border-radius: 12px;
            transition: 0.3s ease;
            width: 100%;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 10px rgba(19, 62, 135, 0.4);
        }

        .btn-login:hover {
            background-color: #0b2f6b;
            box-shadow: 0 6px 14px rgba(19, 62, 135, 0.6);
        }

        @media (max-width: 768px) {
            body {
                background: linear-gradient(145deg, #133E87 0%, #0b2f6b 100%);
            }

            .login-wrapper {
                flex-direction: column;
                width: 90%;
            }

            .login-right {
                display: none;
            }
        }
    </style>


    <div class="login-wrapper">
        {{-- Kiri: Form Login --}}
        <div class="login-left">
            <div class="text-center mb-4">
                <img src="{{ asset('image/logo.png') }}" alt="Logo Pertamina"
                    style="height: 100px; display:block; margin:0 auto;" class="mb-2"
                    onerror="this.onerror=null;this.src='{{ asset('image/foto.png') }}';">
                <p class="login-subtitle">Masuk ke sistem administrasi Anda</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-4 position-relative text-start">
                    <label for="email" class="form-label">Nama Anda</label>
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Masukkan email Anda">
                    @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-4 position-relative text-start">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Masukkan kata sandi">
                    <span class="position-absolute end-0 top-50 translate-middle-y pe-3" style="cursor:pointer;"
                        onclick="togglePassword()">
                        <i class="bi bi-eye" id="toggleIcon"></i>
                    </span>
                    @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                {{-- Tombol Login --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-login">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>

        {{-- Kanan: Gambar Ilustrasi --}}
        <div class="login-right">
            <img src="{{ asset('image/foto.png') }}" alt="Ilustrasi Admin"
                onerror="this.onerror=null;this.src='{{ asset('image/logo.png') }}';">
        </div>
    </div>

    {{-- Icon Bootstrap + Script Toggle Password --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
@endsection
