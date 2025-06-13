{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade Calculator - UNDIP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: white; /* Ubah background menjadi putih */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            cursor: pointer;
        }

        .loading-container {
            text-align: center;
            color: black; /* Teks berwarna hitam untuk kontras */
            animation: fadeIn 1s ease-in;
        }

        .logo {
            width: 200px;
            height: 200px;
            margin: 0 auto 30px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            animation: pulse 2s infinite;
            padding: 20px;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            color: black; /* Warna teks putih */
        }

        .subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 30px;
            color: black; /* Warna teks putih */
        }

        .loading-text {
            font-size: 1rem;
            opacity: 0.8;
            animation: blink 1.5s infinite;
            color: black; /* Warna teks putih */
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid rgba(0,0,0,0.3);
            border-top: 4px solid black;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes blink {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 0.4; }
        }

        .click-hint {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: rgba(0,0,0,0.7); /* Warna teks putih */
            font-size: 0.9rem;
            animation: blink 2s infinite;
        }

        @media (max-width: 768px) {
            .title {
                font-size: 2rem;
            }

            .subtitle {
                font-size: 1rem;
            }

            .logo {
                width: 150px;
                height: 150px;
            }
        }
    </style>
</head>
<body onclick="redirectToLogin()">
    <div class="loading-container">
        <div class="logo">
            <img src="{{ asset('assets/img/logo_undip.png') }}" alt="Logo Undip">
        </div>
        
        <h1 class="title">Student Grade Calculator</h1>
        <p class="subtitle">Universitas Diponegoro Semarang</p>
        
        <div class="spinner"></div>
        <p class="loading-text">Memuat sistem...</p>
    </div>
    
    <div class="click-hint">
        Klik di mana saja untuk melanjutkan
    </div>

    <script>
        // Auto redirect after 3 seconds or on click
        let redirected = false;

        function redirectToLogin() {
            if (!redirected) {
                redirected = true;
                window.location.href = '/login';
            }
        }

        // Auto redirect after 3 seconds
        setTimeout(() => {
            if (!redirected) {
                redirectToLogin();
            }
        }, 3000);

        // Prevent multiple redirects
        window.addEventListener('beforeunload', () => {
            redirected = true;
        });
    </script>
</body>
</html>
