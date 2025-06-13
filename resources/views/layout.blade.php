<!-- resources/views/layout.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <!-- Menampilkan Info Dosen jika tersedia -->
            @if(isset($lecturer))
                <p>Selamat datang, {{ $lecturer->name }}</p>
            @endif
        </nav>
    </header>
    
    <main>
        @yield('content')
    </main>
</body>
</html>
