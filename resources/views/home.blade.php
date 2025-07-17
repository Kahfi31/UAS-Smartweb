<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Ease</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* General Styles */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background: black;
    background-size: cover;
    color: white;
    height: 430vh;
    max-width: 100%;
    overflow-x: hidden;
    position: relative;
}

html {
    scroll-behavior: smooth;
}

/* Navbar Styles - Updated to match transportasi.blade.php */
.navbar {
    position: absolute;
    top: 0;
    left: -20px; /* pastikan 0 agar tidak offset */
    width: 100%;
    padding: 5px 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 100;
    box-sizing: border-box;
    background: transparent;
}

.navbar-links {
    display: flex;
    gap: 100px;
    margin-left: 180px;
}

.navbar-links a {
    color: white;
    text-decoration: none;
    font-size: 20px;
    margin-top: 15px;
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
    gap: 8px; /* jarak antara teks dan avatar */
    background-color: #002f6c; /* biru gelap */
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

/* Hero Section */
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
        url('/images/mountainous-landscape-with-fog 1.png')
        no-repeat center center/cover;
}

.hero-overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
}

.hero-content {
    position: relative;
    z-index: 1;
    max-width: 80%;
    margin-bottom: 100px;
    margin-left: 170px;
    gap: 0px;

}

.hero h1 {
    font-size: 120px;
    font-weight: bold;
    text-transform: uppercase;
    text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.8);
    color: #fff; /* Warna VISIT */
    margin-bottom: 30px;
}

.hero h1 span {
    display: block;
    color: #fff; /* Samakan warna EASE dengan VISIT */
}

.hero p {
    font-size: 20px;
    text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.8);
    color: #fff;
}

.hero button {
    margin-top: 20px;
    padding: 12px 25px;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: 2px solid white;
    font-size: 18px;
    cursor: pointer;
    border-radius: 30px;
}

.hero button:hover {
    background: rgba(255, 255, 255, 0.4);
}

/* Destinations Section */
.destinations {
    text-align: center;
    padding: 50px 0;
    z-index: 2;
}

.destinations h2 {
    font-size: 30px;
    margin-bottom: 20px;
    position: relative;
    display: inline-block;
    padding-bottom: 10px;
}

.destinations h2::after {
    content: "";
    display: block;
    width: 1250px; /* Sesuaikan panjang garis */
    height: 3px; /* Ketebalan garis */
    margin-right: 100px;
    background: rgba(255, 255, 255, 0.6); /* Warna garis */
    margin: 8px auto 0; /* Posisi di tengah */
    transform: translateX(30px);
}

/* Destination Grid */
.destination-grid {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 30px;
}

.destination-grid .destination-card:nth-child(5) {
    margin-top: 50px; /* Sesuaikan jarak sesuai keinginan */
}

/* Destination Card */
.destination-card {
    width: 250px; /* Lebar card */
    height: 400px; /* Menyesuaikan tinggi */
    background: rgba(255, 255, 255, 0.1); /* Transparan */
    border-radius: 15px; /* Membuat sudut lebih halus */
    margin-left: 60px;
    overflow: hidden;
    text-align: center;
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Efek hover */
.destination-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 4px 15px rgba(255, 255, 255, 0.2);
}

/* Gambar di dalam card */
.destination-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.destination-info {
    position: absolute;
    bottom: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.6); /* Warna hitam dengan transparansi */
    padding: 15px 10px;
    color: white;
    text-align: center;
}

.destination-card h3 {
    font-size: 18px;
    margin: 5px 0;
}

.destination-card p {
    font-size: 14px;
    margin-bottom: 0;
}

/* Section Tips */
.tips-section {
    position: relative;
    padding: 80px 0;
    width: 100vw;
    top: -200px;
    display: flex;
    flex-wrap: wrap;
    text-align: center;
    color: white;
    margin-top: 200px;
    overflow: hidden;

    /* Tambahkan gradasi di atas & bawah agar menyatu */
    background:
        linear-gradient(to bottom, black 0%, rgba(0, 0, 0, 0) 20%, rgba(0, 0, 0, 0) 80%, black 100%),
        url('/images/kelingking-beach-nusa-penida-island-bali-indonesia1.png')
        no-repeat center center/cover;
}

.tips-header h2 {
    font-size: 60px;
    bottom: -100px;
    font-weight: bold;
    text-transform: uppercase;
    justify-content: flex-start;
    text-align: left;
    margin-left: 170px;
    text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.8);
    z-index: 2;
}

.tips-header h2 span {
    display: block;
    color: #fff; /* Samakan warna EASE dengan VISIT */
}

.tips-header p {
    font-size: 18px;
    margin-bottom: 30px;
    justify-content: flex-start;
    text-align: left;
    margin-left: 170px;
    margin-top: -20px;
    text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);
}

/* Grid Layout */
.tips-grid {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
}

/* Card Style */
.tips-card {
    width: 300px;
    height: 350px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    margin-left: 80px;
    bottom: 50px;
    right: 80px;
    background: url('tips.png') no-repeat center center/cover;
    overflow: hidden;
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.tips-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 4px 15px rgba(255, 255, 255, 0.2);
}

.tips-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.tips-section .tips-card:nth-child(4),
.tips-section .tips-card:nth-child(5) {
    margin-top: 50px; /* Jaga jarak ke atas */
    right: 280px;
}

/* Card Overlay */
.tips-info1 {
    position: absolute;
    bottom: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.6);
    padding: 15px;
    color: white;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* Pastikan teks berada di bagian atas */
    align-items: center; /* Pastikan teks berada di tengah secara horizontal */
}

.tips-info1 h3 {
    font-size: 18px;
    margin-bottom: 10px;
    position: relative; /* Pastikan elemen bisa dipindahkan */
    top: -20px; /* Geser ke atas */
    display: flex;
    left: -50px;
}

.tips-info1 p {
    font-size: 12px;
    margin-bottom: 10px;
    position: relative; /* Pastikan elemen bisa dipindahkan */
    top: -20px; /* Geser ke atas */
    left: -10px;
    text-align: justify; /* Rata kanan-kiri */
    width: 90%; /* Pastikan teks memiliki cukup lebar */
}

.tips-info1 button {
    background: #022059;;
    padding: 5px 40px;
    color: white;
    margin-right: 140px;
    border: 2px solid black;
    border-radius: 5px;
    cursor: pointer;
}

.tips-info1 button:hover {
    background: rgba(255, 255, 255, 0.4);
}

/* Card Overlay */
.tips-info2 {
    position: absolute;
    bottom: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.6);
    padding: 15px;
    color: white;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* Pastikan teks berada di bagian atas */
    align-items: center; /* Pastikan teks berada di tengah secara horizontal */
}

.tips-info2 h3 {
    font-size: 18px;
    margin-bottom: 10px;
    position: relative; /* Pastikan elemen bisa dipindahkan */
    top: -20px; /* Geser ke atas */
    display: flex;
    left: -40px;
}

.tips-info2 p {
    font-size: 12px;
    margin-bottom: 10px;
    position: relative; /* Pastikan elemen bisa dipindahkan */
    top: -20px; /* Geser ke atas */
    left: -10px;
    text-align: justify; /* Rata kanan-kiri */
    width: 90%; /* Pastikan teks memiliki cukup lebar */
}

.tips-info2 button {
    background: #022059;;
    padding: 5px 40px;
    color: white;
    margin-right: 140px;
    border: 2px solid black;
    border-radius: 5px;
    cursor: pointer;
}

.tips-info2 button:hover {
    background: rgba(255, 255, 255, 0.4);
}

/* Card Overlay */
.tips-info3 {
    position: absolute;
    bottom: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.6);
    padding: 15px;
    color: white;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* Pastikan teks berada di bagian atas */
    align-items: center; /* Pastikan teks berada di tengah secara horizontal */
}

.tips-info3 h3 {
    font-size: 18px;
    margin-bottom: 10px;
    position: relative; /* Pastikan elemen bisa dipindahkan */
    top: -20px; /* Geser ke atas */
    display: flex;
    left: -70px;
}

.tips-info3 p {
    font-size: 12px;
    margin-bottom: 10px;
    position: relative; /* Pastikan elemen bisa dipindahkan */
    top: -20px; /* Geser ke atas */
    left: -10px;
    text-align: justify; /* Rata kanan-kiri */
    width: 90%; /* Pastikan teks memiliki cukup lebar */
}

.tips-info3 button {
    background: #022059;;
    padding: 5px 40px;
    color: white;
    margin-right: 140px;
    border: 2px solid black;
    border-radius: 5px;
    cursor: pointer;
}

.tips-info3 button:hover {
    background: rgba(255, 255, 255, 0.4);
}

/* Card Overlay */
.tips-info4 {
    position: absolute;
    bottom: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.6);
    padding: 15px;
    color: white;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* Pastikan teks berada di bagian atas */
    align-items: center; /* Pastikan teks berada di tengah secara horizontal */
}

.tips-info4 h3 {
    font-size: 18px;
    margin-bottom: 10px;
    position: relative; /* Pastikan elemen bisa dipindahkan */
    top: -20px; /* Geser ke atas */
    display: flex;
    left: -75px;
}

.tips-info4 p {
    font-size: 12px;
    margin-bottom: 10px;
    position: relative; /* Pastikan elemen bisa dipindahkan */
    top: -20px; /* Geser ke atas */
    left: -10px;
    text-align: justify; /* Rata kanan-kiri */
    width: 90%; /* Pastikan teks memiliki cukup lebar */
}

.tips-info4 button {
    background: #022059;;
    padding: 5px 40px;
    color: white;
    margin-right: 140px;
    border: 2px solid black;
    border-radius: 5px;
    cursor: pointer;
}

.tips-info4 button:hover {
    background: rgba(255, 255, 255, 0.4);
}

/* Card Overlay */
.tips-info5 {
    position: absolute;
    bottom: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.6);
    padding: 15px;
    color: white;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* Pastikan teks berada di bagian atas */
    align-items: center; /* Pastikan teks berada di tengah secara horizontal */
}

.tips-info5 h3 {
    font-size: 18px;
    margin-bottom: 17px;
    position: relative; /* Pastikan elemen bisa dipindahkan */
    top: -20px; /* Geser ke atas */
    display: flex;
    left: -90px;
}

.tips-info5 p {
    font-size: 12px;
    margin-bottom: 17px;
    position: relative; /* Pastikan elemen bisa dipindahkan */
    top: -20px; /* Geser ke atas */
    left: -10px;
    text-align: justify; /* Rata kanan-kiri */
    width: 90%; /* Pastikan teks memiliki cukup lebar */
}

.tips-info5 button {
    background: #022059;;
    padding: 5px 40px;
    color: white;
    margin-right: 140px;
    border: 2px solid black;
    border-radius: 5px;
    cursor: pointer;
}

.tips-info5 button:hover {
    background: rgba(255, 255, 255, 0.4);
}

/* Footer Styles - Updated to match transportasi.blade.php */
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

/* Responsive styles - Updated to match transportasi.blade.php */
@media (max-width: 1100px) {
    .navbar-links { gap: 40px; margin-left: 40px; }
}

@media (max-width: 600px) {
    .navbar { flex-direction: column; align-items: flex-start; }
    .navbar-links { flex-direction: column; gap: 10px; margin-left: 0; }
    .navbar-user { margin-right: 0; margin-top: 10px; }
    .user-dropdown { width: 100%; }
    .dropdown-toggle { width: 100%; justify-content: center; margin-right: 0; }
    .dropdown-menu { width: 100%; right: auto; left: 0; }
    .footer .footer-title { font-size: 32px; }
    .footer .footer-title .outline { font-size: 36px; -webkit-text-stroke: 2px #fff; }
    .footer .footer-title .solid { font-size: 32px; }
    .footer .footer-slogan { font-size: 13px; }
    .footer .footer-social a { font-size: 24px; margin: 0 10px; }
    .footer .footer-copyright { font-size: 12px; }
    .footer .footer-divider { margin: 18px 0 10px 0; }
}

.section-divider {
    width: 100vw;
    height: 2px;
    background: #fff;
    opacity: 0.7;
    border: none;
}
    /* Tambahan Media Queries Responsif */
    @media (max-width: 1024px) {
        .navbar-links { gap: 40px; margin-left: 40px; }
        .hero-content { margin-left: 40px; max-width: 95vw; }
        .hero h1 { font-size: 60px; }
        .destinations h2::after { width: 90vw; }
    }
    @media (max-width: 768px) {
        .navbar { flex-direction: column; align-items: flex-start; padding: 8px 4px; }
        .navbar-links { flex-direction: column; gap: 12px; margin-left: 0; width: 100%; }
        .navbar-links a { font-size: 16px; margin-top: 0; padding: 6px 0; }
        .navbar-user { margin-top: 8px; margin-right: 0; }
        .hero { padding: 24px 4px; height: auto; }
        .hero-content { margin-left: 0; max-width: 100vw; }
        .hero h1 { font-size: 36px; }
        .hero p { font-size: 15px; }
        .destinations { padding: 24px 4px; }
        .destination-grid { gap: 10px; }
    }
    @media (max-width: 480px) {
        .navbar { padding: 4px 2px; }
        .navbar-links { gap: 6px; margin-left: 0; width: 100%; }
        .navbar-links a { font-size: 14px; padding: 4px 0; }
        .navbar-user { margin-top: 4px; margin-right: 0; }
        .hero { padding: 8px 2px; height: auto; }
        .hero-content { margin-left: 0; max-width: 100vw; }
        .hero h1 { font-size: 20px; }
        .hero p { font-size: 12px; }
        .destinations { padding: 8px 2px; }
        .destination-grid { gap: 4px; flex-direction: column; }
    }
    </style>
</head>
<body>

    <!-- Navbar - Updated to match transportasi.blade.php -->
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
   <!-- Hero Section -->
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>VISIT <span>EASE</span></h1>
        <p>Akses Transportasi, Tiket, & Destinasi dalam Satu Genggaman!</p>
        <button>Learn More</button>
    </div>
</section>


    <!-- Destination Recommendations -->
    <section class="destinations" id="destinations">
        <h2>Destination Recommendations</h2>
        <div class="destination-grid">
            @foreach([
                ['image' => 'kuliner.png', 'name' => 'Wisata Kuliner', 'desc' => 'Pasar Tradisional', 'route' => route('wisatakuliner.show')],
                ['image' => 'alam.png', 'name' => 'Wisata Alam', 'desc' => 'Pantai & Pulau', 'route' => route('wisataalam.show')],
                ['image' => 'budaya.png', 'name' => 'Wisata Budaya', 'desc' => 'Candi & Situs Sejarah', 'route' => route('wisatabudaya.show')],
                ['image' => 'keluarga.png', 'name' => 'Wisata Keluarga', 'desc' => 'Playground & Kidpark', 'route' => route('wisatakeluarga.show')],
                ['image' => 'urban.png', 'name' => 'Wisata Urban', 'desc' => 'Street Art & Dunia Kreatif', 'route' => route('wisataurban.show')]
            ] as $dest)
                <a href="{{ $dest['route'] }}" class="destination-card" style="text-decoration: none; color: inherit;">
                    <img src="/images/{{ $dest['image'] }}" alt="{{ $dest['name'] }}">
                    <div class="destination-info">
                        <h3>{{ $dest['name'] }}</h3>
                        <p>{{ $dest['desc'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>


    <div class="tips-header">
        <h2>TIPS & <span>PANDUAN PENGGUNA</span></h2>
        <p>Maksimalkan Liburanmu!</p>
    </div>

<section class="tips-section">
    <div class="tips-grid">
        <div class="tips-card">
            <img src="{{ asset('images/tips.png') }}" alt="Tips Budget Traveling">
            <div class="tips-info1">
                <h3>Tips Budget Traveling</h3>
                <p>Gunakan transportasi umum untuk menghemat biaya perjalanan</p>
                <button>Read more</button>
            </div>
        </div>
        <div class="tips-card">
            <img src="{{ asset('images/tips.png') }}" alt="Itinerary Liburan Efektif">
            <div class="tips-info2">
                <h3>Itinerary Liburan Efektif</h3>
                <p>Tentukan prioritas tempat wisata sesuai dengan durasi perjalanan</p>
                <button>Read more</button>
            </div>
        </div>
        <div class="tips-card">
            <img src="{{ asset('images/tips.png') }}" alt="Tips Transportasi">
            <div class="tips-info3">
                <h3>Tips Transportasi</h3>
                <p>Gunakan aplikasi real-time untuk melihat jadwal transportasi umum</p>
                <button>Read more</button>
            </div>
        </div>
        <div class="tips-card">
            <img src="{{ asset('images/tips.png') }}" alt="Packing Cerdas">
            <div class="tips-info4">
                <h3>Packing Cerdas</h3>
                <p>Gunakan koper atau tas backpaper sesuai kebutuhan perjalanan</p>
                <button>Read more</button>
            </div>
        </div>
        <div class="tips-card">
            <img src="{{ asset('images/tips.png') }}" alt="Etika Wisata">
            <div class="tips-info5">
                <h3>Etika Wisata</h3>
                <p>Hormati budaya dan adat setempat</p>
                <button>Read more</button>
            </div>
        </div>
    </div>
</section>

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
</body>
</html>

<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                window.scrollTo({
                    top: target.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });

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
