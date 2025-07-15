<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Visit Ease - Transportasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background-color: #000000;
            background-size: cover;
            color: white;
            overflow-x: hidden;
            position: relative;
        }
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

.navbar::before {
  content: "";
  position: absolute;
  top: 0;
  left: 20px;
  width: 100%;
  height: 100px; /* Sesuaikan tinggi dengan tinggi navbar + sedikit ekstra */
  /* Efek blur */
  backdrop-filter: blur(3px);
  -webkit-backdrop-filter: blur(3px);
  background: linear-gradient(
    to bottom,
    rgba(0, 0, 0, 1) 0px,
    rgba(0, 0, 0, 1) 64px, /* Hitam pekat sampai tinggi menu */
    rgba(0, 0, 0, 0.7) 100px,
    rgba(0, 0, 0, 0.1) 120px
  );
  z-index: -1;
  pointer-events: none;
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

        .main-bg {
            width: 100%;
            min-height: 100vh;
            background-color: #ffffff;
            background-size: cover;
            position: relative;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding-top: 100px;
            padding-bottom: 0px;
        }
        .hero-split-bg {
            display: flex;
            width: 1550px;
            max-width: 100vw;
            height: 100%;
            min-height: 600px;
            position: relative;
            z-index: 2;
        }
        .hero-left-bg {
            flex: 1 1 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('/images/transportasi1.png');
            background-size: cover;
            background-position: 0% 50%;
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-right-radius: 0px;
            height: 100vh;
        }
        .hero-right-bg {
            flex: 1 1 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border-top-right-radius: 32px;
            border-bottom-right-radius: 32px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            height: 100%;
        }
        .hero-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 400px;
            padding: 15rem 2rem;
            background: rgba(245, 240, 235, 0.7); /* Warna putih tulang dengan transparansi */
            backdrop-filter: blur(1px); /* Efek blur */
            -webkit-backdrop-filter: blur(1px);
            border-radius: 15px;
            margin: 0 auto;
            text-align: center;
        }
        .hero-card .visit {
            font-size: 6.0rem;
            font-weight: 800;
            color: #fff;
            -webkit-text-stroke: 2px #022059;
            text-stroke: 2px #022059;
            letter-spacing: 2px;
            margin-bottom: -10px;
        }
        .hero-card .ease {
            font-size: 6.0rem;
            font-weight: 800;
            color: #022059;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }
        .hero-card .cari {
            font-size: 2.2rem;
            color: #022059;
            font-weight: 400;
            margin-bottom: 0;
        }
        .search-section {
            background: none;
            border-radius: 0;
            box-shadow: none;
            padding: 50px;
            min-width: 0;
            max-width: 400px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .search-section h2 {
            color: #022059;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 50px;
            text-align: left;
        }
        .search-form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .search-input {
            width: 100%;
            padding: 14px 18px;
            border-radius: 10px;
            border: none;
            background: #ededed;
            font-size: 16px;
            color: #222;
        }
        .search-input:focus {
            outline: 2px solid #0a1a3a;
        }
        .search-link {
            color: #0a1a3a;
            font-size: 13px;
            margin-left: 4px;
            margin-top: -10px;
            margin-bottom: 10px;
            cursor: pointer;
            text-decoration: underline;
        }
        .search-btn {
            width: 100%;
            background: #0a1a3a;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 14px 0;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
        }
        .search-btn:hover {
            background: #1a2a5a;
        }
        .search-btn:disabled {
            background: #666;
            cursor: not-allowed;
        }
        .result-label {
            color: #ffffff;
            font-size: 15px;
            margin: 32px auto 8px auto;
            text-align: center;
            padding: 10px 20px;
            border-radius: 8px;
            display: block;
            width: fit-content;
        }
        .result-card {
            background: #232323;
            border-radius: 18px;
            padding: 32px 36px 24px 36px;
            max-width: 900px;
            margin: 0 auto 40px auto;
            box-shadow: 0 4px 24px 0 rgba(0,0,0,0.18);
        }
        .result-item {
            margin-bottom: 24px;
        }
        .result-item:last-child {
            margin-bottom: 0;
        }
        .result-title {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 6px;
        }
        .result-info {
            font-size: 15px;
            margin-bottom: 2px;
        }
        .result-btn {
            background: #ff4d37;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 7px 24px;
            font-size: 15px;
            font-weight: 600;
            margin-top: 8px;
            cursor: pointer;
        }
        .result-btn:hover {
            background: #ff6d57;
        }
        .rute-item {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #444;
            border-radius: 8px;
            background-color: #2a2a2a;
        }
        .rute-title {
            color: #ff4d37;
            margin-bottom: 10px;
            font-weight: 700;
        }

        /* Modal Styles */
        .modal {
            position: fixed;
            z-index: 10000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.8);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: #232323;
            margin: 5% auto;
            padding: 0;
            border-radius: 15px;
            width: 80%;
            max-width: 800px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .modal-header {
            padding: 20px 25px 15px 25px;
            border-bottom: 1px solid #444;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            color: #fff;
            margin: 0;
            font-size: 20px;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close:hover {
            color: #ff4d37;
        }

        .modal-body {
            padding: 20px 25px 25px 25px;
        }
        #map {
            width: 100% !important;
            height: 400px !important;
            min-height: 300px;
            background: #e0f0fa;
            z-index: 1;
        }
        .result-separator {
            border: none;
            border-top: 1px solid #888;
            margin: 24px 0;
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
        @media (max-width: 1100px) {
            .navbar-links { gap: 40px; margin-left: 40px; }
            .hero-split-bg { flex-direction: column; align-items: stretch; height: auto; gap: 24px; }
            .hero-left-bg, .hero-right-bg { min-height: 220px; margin: 0; border-radius: 32px; }
        }
        @media (max-width: 800px) {
            .hero-left-bg, .hero-right-bg { padding: 24px 10px; }
            .hero-split-bg { gap: 16px; }
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
            .hero-split-bg { flex-direction: column; align-items: stretch; }
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
</head>
<body>
    <!-- Navbar -->
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
    <div class="main-bg">
        <div class="hero-split-bg">
            <div class="hero-left-bg">
                <div class="hero-card">
                    <div class="visit" style="-webkit-text-stroke: 2px #022059; color: transparent;">VISIT</div>
                    <div class="ease">EASE</div>
                    <div class="cari">Cariin!</div>
                </div>
            </div>
            <div class="hero-right-bg">
                <div class="search-section">
                    <h2>Temukan Rute Transportasi Umum Terbaik dari Lokasimu</h2>
                    <form class="search-form">
                        <input type="text" class="search-input" placeholder="Masukan Lokasi Asal">
                        <a class="search-link">Gunakan lokasi sekarang</a>
                        <input type="text" class="search-input" placeholder="Masukan Lokasi Tujuan">
                        <button type="submit" class="search-btn">Tampilkan hasil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Divider sebelum result -->
    <hr class="footer-divider" style="width: 70%; margin-top:40px; margin-bottom:0;">
    <div class="result-label">Tampilan Hasil</div>
    <div class="result-card" id="resultCard" style="display: none;">
        <div class="result-item">
            <div class="result-title">Rute Transportasi</div>
            <div class="result-info">Dari <b id="asalDisplay"></b> &rarr; <b id="tujuanDisplay"></b></div>
            <div id="ruteList"></div>
        </div>
    </div>

    <!-- Modal Peta -->
    <div id="mapModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Detail Rute</h3>
                <span class="close" onclick="closeMapModal()">&times;</span>
            </div>
            <div class="modal-body">
                <div id="map" style="width: 100%; height: 400px;"></div>
                <div id="routeInfo" style="margin-top: 15px;">
                    <div class="result-info">Estimasi waktu: <b id="modalDurasi"></b></div>
                    <div class="result-info">Jarak: <b id="modalJarak"></b></div>
                </div>
            </div>
        </div>
    </div>
    <div class="result-card" id="errorCard" style="display: none;">
        <div class="result-item">
            <div class="result-title" style="color: #ff4d37;">Error</div>
            <div class="result-info" id="errorMessage"></div>
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

        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script src="https://unpkg.com/@mapbox/polyline"></script>
    <script>
        let map = null;
        let currentRouteData = {};

        // Global variables untuk menyimpan data rute
        let routeCoordinates = {};

        // Toggle dropdown function
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            const toggle = document.querySelector('.dropdown-toggle');

            dropdown.classList.toggle('show');
            toggle.classList.toggle('active');
        }

        // Close dropdown when clicking outside
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-toggle') && !event.target.closest('.dropdown-toggle')) {
                const dropdowns = document.getElementsByClassName('dropdown-menu');
                const toggles = document.getElementsByClassName('dropdown-toggle');

                for (let dropdown of dropdowns) {
                    if (dropdown.classList.contains('show')) {
                        dropdown.classList.remove('show');
                    }
                }

                for (let toggle of toggles) {
                    if (toggle.classList.contains('active')) {
                        toggle.classList.remove('active');
                    }
                }
            }
        }

        document.querySelector('.search-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            const asal = document.querySelectorAll('.search-input')[0].value;
            const tujuan = document.querySelectorAll('.search-input')[1].value;

            // Validasi input
            if (!asal || !tujuan) {
                showError('Mohon isi lokasi asal dan tujuan');
                return;
            }

            // Sembunyikan hasil sebelumnya
            document.getElementById('resultCard').style.display = 'none';
            document.getElementById('errorCard').style.display = 'none';

            // Tampilkan loading
            const searchBtn = document.querySelector('.search-btn');
            const originalText = searchBtn.textContent;
            searchBtn.textContent = 'Mencari...';
            searchBtn.disabled = true;

            try {
                const response = await fetch('/transportasi/rute', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ asal, tujuan })
                });

                const result = await response.json();

                if (response.ok) {
                    showResult(asal, tujuan, result);
                } else {
                    showError(result.message || 'Terjadi kesalahan saat mencari rute');
                }
            } catch (error) {
                console.error('Error:', error);
                showError('Terjadi kesalahan jaringan. Silakan coba lagi.');
            } finally {
                // Kembalikan tombol ke kondisi semula
                searchBtn.textContent = originalText;
                searchBtn.disabled = false;
            }
        });

        function showResult(asal, tujuan, result) {
            document.getElementById('asalDisplay').textContent = asal;
            document.getElementById('tujuanDisplay').textContent = tujuan;

            // Tampilkan semua rute yang tersedia
            const ruteList = document.getElementById('ruteList');
            ruteList.innerHTML = '';

            result.rute.forEach((rute, index) => {
                const ruteElement = document.createElement('div');
                ruteElement.className = 'rute-item';

                ruteElement.innerHTML = `
                    <div class="rute-title">
                        Rute ${rute.rute_ke}
                    </div>
                    <div class="result-info">Estimasi waktu: <b>${rute.durasi_menit} menit</b></div>
                    <div class="result-info">Jarak: <b>${rute.jarak_km} km</b></div>
                    <button class="result-btn" style="margin-top: 10px;" onclick="showRouteDetail(${index})">Lihat Rute Detail</button>
                `;

                ruteList.appendChild(ruteElement);

                // Tambahkan separator kecuali untuk item terakhir
                if (index < result.rute.length - 1) {
                    const separator = document.createElement('hr');
                    separator.className = 'result-separator';
                    separator.style.margin = '15px 0';
                    ruteList.appendChild(separator);
                }
            });

            // Simpan data rute untuk digunakan di modal
            routeCoordinates = result.rute;

            document.getElementById('resultCard').style.display = 'block';
            document.getElementById('errorCard').style.display = 'none';
        }

        function showError(message) {
            document.getElementById('errorMessage').textContent = message;
            document.getElementById('errorCard').style.display = 'block';
            document.getElementById('resultCard').style.display = 'none';
        }

        // Fungsi untuk menggunakan lokasi sekarang
        document.querySelector('.search-link').addEventListener('click', function(e) {
            e.preventDefault();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;

                    // Reverse geocoding untuk mendapatkan nama lokasi
                    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`)
                        .then(response => response.json())
                        .then(data => {
                            const locationName = data.display_name.split(',')[0];
                            document.querySelectorAll('.search-input')[0].value = locationName;
                        })
                        .catch(() => {
                            document.querySelectorAll('.search-input')[0].value = `${lat}, ${lon}`;
                        });
                }, function() {
                    alert('Tidak dapat mengakses lokasi Anda');
                });
            } else {
                alert('Browser Anda tidak mendukung geolokasi');
            }
        });

        // Fungsi untuk menampilkan detail rute
    function showRouteDetail(routeIndex) {
        const route = routeCoordinates[routeIndex];
        if (!route) return;

        // Update modal content
        document.getElementById('modalTitle').textContent = `Rute ${route.rute_ke}`;
        document.getElementById('modalDurasi').textContent = `${route.durasi_menit} menit`;
        document.getElementById('modalJarak').textContent = `${route.jarak_km} km`;

        // Tampilkan modal
        document.getElementById('mapModal').style.display = 'block';

        // Inisialisasi peta setelah modal muncul (delay sedikit agar div siap)
        setTimeout(() => {
            initMap(route);
        }, 200);
    }

    // Fungsi untuk menutup modal
    function closeMapModal() {
        document.getElementById('mapModal').style.display = 'none';
        if (map) {
            map.remove();
            map = null;
        }
    }

    // Fungsi untuk inisialisasi peta
    function initMap(route) {
        if (map) {
            map.remove();
            map = null;
        }

        map = L.map('map').setView([0, 0], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        try {
            console.log("Raw geometry:", route.geometry);

            const coordinates = polyline.decode(route.geometry);
            console.log("Decoded coordinates:", coordinates);

            if (coordinates && coordinates.length > 0) {
                // Auto detect apakah format [lng, lat], lalu swap
                const first = coordinates[0];
                let finalCoords = coordinates;
                if (Math.abs(first[0]) > 90) {
                    console.warn("Koordinat kebalik (lng, lat), swap ke (lat, lng)");
                    finalCoords = coordinates.map(c => [c[1], c[0]]);
                }

                const routeLine = L.polyline(finalCoords, {
                    color: '#ff4d37',
                    weight: 4,
                    opacity: 0.8
                }).addTo(map);

                const startPoint = finalCoords[0];
                const endPoint = finalCoords[finalCoords.length - 1];

                if (startPoint && endPoint) {
                    // Marker Start
                    L.marker(startPoint, {
                        icon: L.divIcon({
                            className: 'custom-div-icon',
                            html: '<div style="background-color:#4CAF50; border-radius:50%; width:20px; height:20px; border:3px solid #fff;"></div>',
                            iconSize: [20, 20],
                            iconAnchor: [10, 10]
                        })
                    }).addTo(map);

                    // Marker End
                    L.marker(endPoint, {
                        icon: L.divIcon({
                            className: 'custom-div-icon',
                            html: '<div style="background-color:#f44336; border-radius:50%; width:20px; height:20px; border:3px solid #fff;"></div>',
                            iconSize: [20, 20],
                            iconAnchor: [10, 10]
                        })
                    }).addTo(map);
                }

                map.fitBounds(routeLine.getBounds(), { padding: [20, 20] });
            } else {
                console.error("Koordinat rute kosong");
                map.setView([0, 0], 2);
            }
        } catch (error) {
            console.error('Error decoding route geometry:', error);
            map.setView([0, 0], 2);
            L.popup()
                .setLatLng([0, 0])
                .setContent('Gagal menampilkan rute pada peta')
                .openOn(map);
        }
    }
    </script>
