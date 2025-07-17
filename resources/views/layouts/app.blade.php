<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VisitEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background-color: #f3f4f6;
        }

        /* Header */
        header {
            background-color: #022059;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 2rem;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar div a {
            margin-right: 1.5rem;
            text-decoration: none;
            color: #022059;
            font-weight: 500;
        }

        .navbar div a:hover {
            text-decoration: underline;
        }

        .login-button {
            text-decoration: none;
            background-color: #022059;
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-weight: 600;
        }

        .login-button:hover {
            background-color: #011437;
        }

        main {
            padding: 2rem;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 1024px) {
            .navbar {
                padding: 0.75rem 1rem;
            }
            main {
                padding: 1.2rem;
            }
        }
        @media (max-width: 768px) {
            header h1 {
                font-size: 1.3rem;
            }
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                padding: 0.5rem 0.5rem;
            }
            .navbar div {
                width: 100%;
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }
            .navbar div a {
                margin-right: 0;
                font-size: 1rem;
                padding: 0.3rem 0;
            }
            .login-button {
                width: 100%;
                margin-top: 0.5rem;
                padding: 0.5rem 0;
                font-size: 1rem;
            }
            main {
                padding: 0.7rem;
            }
        }
        @media (max-width: 480px) {
            header h1 {
                font-size: 1rem;
            }
            .navbar {
                padding: 0.3rem 0.2rem;
            }
            .navbar div a {
                font-size: 0.95rem;
                padding: 0.2rem 0;
            }
            .login-button {
                font-size: 0.95rem;
                padding: 0.4rem 0;
            }
            main {
                padding: 0.3rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>VisitEase</h1>
    </header>

    <!-- Navbar -->
    <nav class="navbar">
        <div>
            <a href="/">Beranda</a>
            <a href="/wisataurban/show">Destinasi</a>
            <a href="/rekomendasiAI">Rekomendasi AI</a>
            <a href="/transportasi">Transportasi</a>
            <a href="/komunitas">Komunitas</a>
            @auth
                <a href="/tambahteman">Tambah Teman</a>
                @if(auth()->user()->role === 'guide' || auth()->user()->role === 'admin')
                    <a href="/tambahdestinasi">Tambah Destinasi</a>
                @endif
                @if(auth()->user()->role === 'admin')
                    <a href="/admin">Admin Dashboard</a>
                @endif
            @endauth
        </div>
        @auth
            <a href="/logout" class="login-button">Logout</a>
        @else
            <a href="/login" class="login-button">Login</a>
        @endauth
    </nav>

    <main>
        @if(session('error'))
            <div style="background-color: #fef2f2; color: #dc2626; padding: 1rem; margin: 1rem 2rem; border-radius: 6px; border: 1px solid #fecaca;">
                <strong>Error:</strong> {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div style="background-color: #f0fdf4; color: #166534; padding: 1rem; margin: 1rem 2rem; border-radius: 6px; border: 1px solid #bbf7d0;">
                <strong>Success:</strong> {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
