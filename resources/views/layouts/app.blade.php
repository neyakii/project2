<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classmeet SMKN 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ffc2c2, #ff9e9e);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            color: #6a097d;
            font-weight: 600;
        }

        .navbar {
            background: #ffe5e5;
            box-shadow: 0 4px 15px rgba(0,0,0,0.07);
            border-radius: 0 0 15px 15px;
            padding: 1rem 0.5rem;
        }

        .navbar-brand {
            font-weight: 800;
            color: #9900b8ff !important;
            font-size: 1.7rem;
            letter-spacing: 0.5px;
        }

        .nav-link {
            color: #7c0070ff !important;
            font-weight: 500;
            margin-left: 15px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: #f94dffff !important;
            transform: scale(1.05);
        }

        .btn-link.nav-link {
            border: none;
            background: transparent;
        }

        main.container {
            padding-top: 40px;
            padding-bottom: 60px;
        }

        .alert-success {
            animation: fadeIn 0.5s ease-in-out;
            border-radius: 10px;
            background-color: #ffbaba;
            border: 1px solid #ff7c7c;
            color: #4d006bff;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        footer {
            background: #ffe5e5;
            text-align: center;
            padding: 20px;
            border-top: 1px solid #ffd6d6;
            color: #6b0000;
            font-size: 0.9rem;
            margin-top: 60px;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">Classmeet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="/contents">Konten</a></li>
                        <li class="nav-item"><a class="nav-link" href="/categories">Kategori</a></li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-link nav-link" type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        @if(session('success'))
            <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} SMKN 5 Malang — Classmeet Web App
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
