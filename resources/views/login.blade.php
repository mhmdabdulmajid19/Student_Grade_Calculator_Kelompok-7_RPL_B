{{-- resources/views/login.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dosen - Student Grade Calculator</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: white; /* White background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
            padding: 40px;
            text-align: center;
        }

        .login-header {
            margin-bottom: 30px;
        }

        .logo img {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }

        .login-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }

        .login-form {
            padding: 0 40px 40px;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .input-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .form-control {
            width: 100%;
            padding: 16px 50px 16px 50px; /* Consistent padding for both sides */
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
            background: white;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }

        .form-control.error {
            border-color: #dc3545;
            background: #fff5f5;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            font-size: 18px;
            z-index: 1;
            pointer-events: none;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #666;
            cursor: pointer;
            font-size: 18px;
            z-index: 1;
            padding: 0;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }

        .checkbox {
            width: 18px;
            height: 18px;
            accent-color: #007bff;
        }

        .checkbox-label {
            font-size: 0.9rem;
            color: #666;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .forgot-password {
            text-align: center;
            margin-top: 16px;
        }

        .forgot-password a {
            color: #007bff;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 8px;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .error-message .icon {
            font-size: 14px;
        }

        /* Ensure icons stay in position even with errors */
        .form-group .input-icon,
        .form-group .password-toggle {
            position: absolute;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 480px) {
            .login-container {
                margin: 10px;
                padding: 30px 20px;
            }

            .login-header {
                margin-bottom: 20px;
            }

            .login-form {
                padding: 0 20px 20px;
            }

            .login-title {
                font-size: 1.5rem;
            }

            .form-control {
                padding: 14px 45px 14px 45px;
                font-size: 14px;
            }

            .input-icon {
                left: 12px;
                font-size: 16px;
            }

            .password-toggle {
                right: 12px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo">
                <img src="{{ asset('assets/img/logo_undip.png') }}" alt="Logo Undip">
            </div>
            <h1 class="login-title">HALAMAN MASUK DOSEN</h1>
        </div>

        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- NIP Field -->
            <div class="form-group">
                <div class="input-container">
                    <div class="input-icon">👤</div>
                    <input 
                        type="text" 
                        id="nip" 
                        name="nip" 
                        class="form-control {{ $errors->has('nip') ? 'error' : '' }}"
                        value="{{ old('nip') }}"
                        placeholder="Masukkan NIP Anda"
                        required
                        autocomplete="username"
                    >
                </div>
                @error('nip')
                    <div class="error-message">
                        <span class="icon">⚠️</span>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <div class="input-container">
                    <div class="input-icon">🔒</div>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-control {{ $errors->has('password') ? 'error' : '' }}"
                        placeholder="Masukkan kata sandi"
                        required
                        autocomplete="current-password"
                    >
                    <button type="button" class="password-toggle" onclick="togglePassword()">
                        <span id="toggleIcon">👁️</span>
                    </button>
                </div>
                @error('password')
                    <div class="error-message">
                        <span class="icon">⚠️</span>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="remember" name="remember" class="checkbox">
                <label for="remember" class="checkbox-label">Ingat Saya</label>
            </div>

            <button type="submit" class="btn-login">
                Masuk
            </button>

            <div class="forgot-password">
                <p>Lupa kata sandi? <a href="https://wa.me/6289647758245" target="_blank">Atur ulang</a></p>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.textContent = '🙈';
            } else {
                passwordField.type = 'password';
                toggleIcon.textContent = '👁️';
            }
        }

        // Auto-focus on first input
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('nip').focus();
        });

        // Prevent form submission on toggle button click
        document.querySelector('.password-toggle').addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
        });
    </script>
</body>
</html>