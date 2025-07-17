<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komunitas | Visit Ease</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #000;
            color: #fff;
        }
        /* Hero Section Styles - Sama seperti home.blade.php */
        .hero {
            max-width: 100%;
            display: block;
            position: relative;
            padding: 50px 0;
            height: 90vh;
            width: 100vw;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            text-align: left;
            background:
                linear-gradient(to bottom, rgba(0, 0, 0, 0) 60%, black 100%),
                url('/images/thailand.png')
                no-repeat center 20%/cover;
        }
        .hero-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0);
        }
        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 40%;
            margin-bottom: 100px;
            margin-left: 170px;
            gap: 0px;
        }
        .hero-content h1 {
            font-size: 64px;
            font-weight: bold;
            text-transform: uppercase;
            text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.8);
            color: #fff;
            margin-bottom: 30px;
        }
        .hero-content h1 span {
            display: block;
            color: #fff;
        }
        .hero-content p {
            font-size: 20px;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.8);
            color: #fff;
        }
        .hero-content button {
            margin-top: 20px;
            padding: 12px 25px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid white;
            font-size: 18px;
            cursor: pointer;
            border-radius: 30px;
        }
        .hero-content button:hover {
            background: rgba(255, 255, 255, 0.4);
        }
        @media (max-width: 900px) {
            .hero-content { margin-left: 30px; max-width: 90vw; }
            .hero-content h1 { font-size: 36px; }
            .hero-content p { font-size: 15px; }
        }
        @media (max-width: 768px) {
            .navbar { flex-direction: column; align-items: flex-start; padding: 8px 4px; }
            .navbar-links { flex-direction: column; gap: 12px; margin-left: 0; width: 100%; }
            .navbar-links a { font-size: 16px; margin-top: 0; padding: 6px 0; }
            .navbar-user { margin-top: 8px; margin-right: 0; }
            .hero { padding: 24px 4px; height: auto; }
            .hero-content { margin-left: 0; max-width: 100vw; }
            .hero-content h1 { font-size: 24px; }
            .hero-content p { font-size: 13px; }
            .section { padding: 24px 4px 0 4px; }
            .cards { gap: 10px; }
        }
        @media (max-width: 480px) {
            .navbar { padding: 4px 2px; }
            .navbar-links { gap: 6px; margin-left: 0; width: 100%; }
            .navbar-links a { font-size: 14px; padding: 4px 0; }
            .navbar-user { margin-top: 4px; margin-right: 0; }
            .hero { padding: 8px 2px; height: auto; }
            .hero-content { margin-left: 0; max-width: 100vw; }
            .hero-content h1 { font-size: 14px; }
            .hero-content p { font-size: 10px; }
            .section { padding: 8px 2px 0 2px; }
            .cards { gap: 4px; flex-direction: column; }
        }
        .navbar {
            position: absolute;
            top: 0;
            left: -20px;
            width: 100%;
            padding: 5px 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), transparent);
            z-index: 100;
            box-sizing: border-box;
        }
        .navbar-links {
            display: flex;
            gap: 100px;
            margin-left: 160px;
        }
        .navbar-links a {
            color: white;
            text-decoration: none;
            font-size: 20px;
            margin-top: 18px;
        }
        .navbar-links a:hover {
            text-decoration: underline;
        }
        .navbar-user {
            margin-right: -20px;
            margin-top: 20px;
        }
        .login-button {
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: #002f6c;
            color: white;
            font-weight: bold;
            margin-right: -30px;
            padding: 10px 30px;
            border-radius: 30px;
            text-decoration: none;
        }
        .login-button .avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }
        .login-button:hover {
            background-color: #033072;
        }
        .username {
            font-weight: bold;
        }
        .avatar {
            border-radius: 50%;
            width: 32px;
            height: 32px;
        }
        .section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 30px 0 30px;
        }
        .section h2 {
            font-size: 38px;
            font-weight: 800;
            margin-bottom: 32px;
            line-height: 1.1;
        }
        .cards {
            display: flex;
            gap: 32px;
            flex-wrap: wrap;
        }
        .card {
            background: #fff;
            color: #222;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            padding: 24px 20px 18px 20px;
            flex: 1 1 320px;
            min-width: 320px;
            max-width: 370px;
            margin-bottom: 32px;
        }
        .card .user {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .card .user .avatar {
            width: 36px; height: 36px;
            background: #ccc;
            border-radius: 50%;
            margin-right: 10px;
        }
        .card .user .info {
            display: flex;
            flex-direction: column;
        }
        .card .user .info .name {
            font-weight: 600;
            font-size: 15px;
        }
        .card .user .info .label {
            font-size: 11px;
            color: #FF4D00;
            font-weight: bold;
            margin-top: 2px;
        }
        .card .desc {
            font-size: 14px;
            margin-bottom: 16px;
        }
        .card .images {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }
        .card .images .img {
            width: 56px; height: 40px;
            background: #e0e0e0;
            border-radius: 6px;
        }
        .card .actions {
            display: flex;
            gap: 18px;
            font-size: 13px;
            color: #666;
            margin-top: 8px;
        }
        /* Footer Styles (copy dari footer yang sudah ada) */
        .footer {
            width: 100vw;
            background: #000;
            color: #fff;
            text-align: center;
            padding: 40px 10px 0 10px;
            margin-top: 50px;
            position: relative;
            left: 50%;
            right: 50%;
            transform: translateX(-50%);
            box-shadow: none;
        }
        .footer .footer-title {
            font-size: 64px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 0px;
            line-height: 1.1;
        }
        .footer .footer-title .outline {
            color: #000;
            -webkit-text-stroke: 3px #fff;
            text-stroke: 3px #fff;
            font-weight: 800;
            font-size: 72px;
            letter-spacing: 2px;
            display: block;
        }
        .footer .footer-title .solid {
            color: #fff;
            font-weight: 800;
            font-size: 64px;
            letter-spacing: 2px;
            display: block;
            margin-top: -10px;
        }
        .footer .footer-slogan {
            font-size: 20px;
            margin-bottom: 24px;
            color: #fff;
            font-weight: 400;
        }
        .footer .footer-social {
            margin: 24px 0 24px 0;
        }
        .footer .footer-social a {
            color: #fff !important;
            margin: 0 24px;
            font-size: 40px;
            transition: color 0.2s, transform 0.2s;
            display: inline-block;
        }
        .footer .footer-social a:hover {
            color: #fff;
            transform: scale(1.2);
        }
        .footer .footer-copyright {
            margin-top: 18px;
            font-size: 18px;
            color: #fff;
            font-weight: 400;
            padding-bottom: 10px;
        }
        .footer .footer-divider {
            width: 100%;
            height: 2px;
            background: #fff;
            margin: 32px 0 18px 0;
            opacity: 0.7;
        }

        /* Hover effect untuk link ulasan */
        .ulasan-link:hover {
            background: #FFC107 !important;
            transform: translateY(-2px);
        }

        /* User Dropdown Styles */
        .user-dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-toggle {
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: #002f6c;
            color: white;
            font-weight: bold;
            margin-right: -30px;
            padding: 10px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-family: inherit;
            font-size: inherit;
        }

        .dropdown-toggle:hover {
            background-color: #033072;
        }

        .dropdown-toggle i {
            font-size: 12px;
            transition: transform 0.3s ease;
        }

        .dropdown-toggle.active i {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            min-width: 200px;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s ease;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            font-family: inherit;
            font-size: inherit;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background-color: #f5f5f5;
            color: #002f6c;
        }

        .dropdown-item i {
            width: 16px;
            text-align: center;
        }

        .logout-btn {
            border-top: 1px solid #eee;
            color: #dc3545;
        }

        .logout-btn:hover {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
    <!-- Font Awesome for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <!-- Navbar - Sama seperti home.blade.php -->
    <nav class="navbar">
        <div class="navbar-links">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="#destinations">Destinasi</a>
            <a href="{{ url('/rekomendasiAI') }}">Rekomendasi AI</a>
            <a href="{{ url('/transportasi') }}">Transportasi</a>
            <a href="{{ url('/komunitas') }}">Komunitas</a>
        </div>
        <div class="navbar-user">
            @auth
                <!-- User dropdown for authenticated users -->
                <div class="user-dropdown">
                    <button class="login-button dropdown-toggle" onclick="toggleDropdown()">
                        <img src="{{ auth()->user()->avatar ? asset('storage/avatars/' . auth()->user()->avatar) : asset('images/avatar.jpg') }}" alt="User" class="avatar">
                        <span>{{ auth()->user()->first_name }}</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="dropdown-menu" id="userDropdown">
                        <a href="{{ route('profile.show') }}" class="dropdown-item">
                            <i class="fas fa-user"></i>
                            <span>Profil</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="dropdown-item logout-btn">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Login button for guests -->
                <a href="{{ url('/login') }}" class="login-button">
                    <img src="{{ asset('images/avatar.jpg') }}" alt="User" class="avatar">
                    <span>Login</span>
                </a>
            @endauth
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>GABUNG <span>KOMUNITAS <span> VISIT EASE</span></h1>
            <p>Tanya, berbagi cerita, dan temukan inspirasi <br> perjalanan dari sesama pengguna VisitEase!</br></p>
        </div>
    </section>

    <div class="section">
        <h2>ULASAN &<br>PENGALAMAN PENGGUNA</h2>
        <div style="text-align: left; margin-bottom: 30px;">
            <a href="{{ route('ulasan.index') }}" class="ulasan-link" style="background: #FFD600; color: #000; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: bold; display: inline-block; transition: all 0.3s;">
                <i class="fas fa-star"></i> Lihat Semua Ulasan & Rating
            </a>
        </div>
        <div class="cards">
            @forelse($userReviews as $review)
                <div class="card">
                    <div class="user">
                        <div class="avatar" style="background:#4a90e2; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:bold;">
                            @if(isset($review->user) && $review->user && $review->user->avatar)
                                <img src="{{ asset('storage/avatars/' . $review->user->avatar) }}" alt="User" style="width:36px; height:36px; border-radius:50%; object-fit:cover;">
                            @else
                                {{ strtoupper(substr($review->user->first_name ?? 'U',0,1)) }}
                            @endif
                        </div>
                        <div class="info">
                            <span class="name">{{ $review->user->first_name ?? 'Pengguna' }} {{ $review->user->last_name ?? '' }}</span>
                            <span class="label">PENGUNJUNG</span>
                        </div>
                    </div>
                    <div class="desc" style="margin-bottom:10px;">
                        <b>{{ $review->nama_tempat }}</b>
                    </div>
                    <div class="desc">{{ $review->ulasan }}</div>
                    <div class="images" style="margin-bottom:0;">
                        <div class="stars">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star star {{ $i <= $review->rating ? '' : 'empty' }}" style="color:{{ $i <= $review->rating ? '#FFD600' : '#ddd' }};"></i>
                            @endfor
                            <span style="color:#888; font-size:13px; margin-left:8px;">({{ $review->rating }})</span>
                        </div>
                    </div>
                    <div class="actions" style="margin-top:8px; color:#666; font-size:13px;">
                        <span><i class="fa-regular fa-calendar"></i> {{ $review->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            @empty
                <div style="color:#fff;">Belum ada ulasan pengguna.</div>
            @endforelse
        </div>
    </div>

    <div class="section">
        <h2>FORUM DISKUSI &<br>TANYA JAWAB</h2>
        <div class="cards">
            @if(Auth::check())
                @forelse($friends as $friend)
                    <div class="card">
                        <div class="user">
                            <div class="avatar" style="background:#4a90e2; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:bold;">
                                {{ strtoupper(substr($friend->first_name,0,1)) }}
                            </div>
                            <div class="info">
                                <span class="name">{{ $friend->first_name }} {{ $friend->last_name }}</span>
                                <span class="label">TEMAN</span>
                            </div>
                        </div>
                        <div class="desc" style="margin-bottom:18px;">Klik untuk mulai chat atau diskusi dengan teman ini.</div>
                        <div class="actions">
                            <a href="/tambahteman?user={{ $friend->id }}" class="chat-link" style="color:#1976d2; font-weight:bold; text-decoration:none;">
                                <i class="fa-regular fa-comments"></i> Chat Teman
                            </a>
                        </div>
                    </div>
                @empty
                    <div style="color:#fff;">
                        Belum ada teman.<br>
                        <a href="{{ url('/tambahteman') }}" style="background: #FFD600; color: #000; padding: 10px 22px; border-radius: 8px; text-decoration: none; font-weight: bold; display: inline-block; margin-top: 12px;">
                            <i class="fas fa-user-plus"></i> Tambah Teman
                        </a>
                    </div>
                @endforelse
            @else
                <div style="color:#fff;">Silakan login untuk melihat daftar teman.</div>
            @endif
        </div>
    </div>

    <!-- Divider sebelum footer -->
    <hr class="footer-divider" style="margin-top:60px; margin-bottom:0;">
    <footer class="footer">
        <div class="footer-title">
            <span class="outline">VISIT</span>
            <span class="solid">EASE</span>
        </div>
        <div class="footer-slogan">Akses Transportasi, Tiket, & Destinasi dalam Satu Genggaman!</div>
        <div>Find us on:</div>
        <div class="footer-social">
            <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
            <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
            <a href="#" title="Twitch"><i class="fab fa-twitch"></i></a>
            <a href="#" title="TikTok"><i class="fab fa-tiktok"></i></a>
            <a href="#" title="X"><i class="fab fa-x-twitter"></i></a>
        </div>
        <div class="footer-divider"></div>
        <div class="footer-copyright">
            &copy; 2025 [Nama Aplikasi]. Seluruh hak cipta dilindungi undang-undang.
        </div>
    </footer>

    <script>
        // Dropdown functionality
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            const toggle = document.querySelector('.dropdown-toggle');

            dropdown.classList.toggle('show');
            toggle.classList.toggle('active');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('userDropdown');
            const toggle = document.querySelector('.dropdown-toggle');

            if (dropdown && !toggle.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.remove('show');
                toggle.classList.remove('active');
            }
        });

        // Close dropdown when pressing Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const dropdown = document.getElementById('userDropdown');
                const toggle = document.querySelector('.dropdown-toggle');

                if (dropdown) {
                    dropdown.classList.remove('show');
                    toggle.classList.remove('active');
                }
            }
        });
    </script>
</body>
</html>
