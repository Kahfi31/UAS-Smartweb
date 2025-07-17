<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Visit Ease - Wisata Kuliner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: black;
            background-size: cover;
            color: white;
            overflow-x: hidden;
            position: relative;
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

        /* Hero */
        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 100px 170px 60px;
            flex-wrap: wrap;
        }

        .hero-text {
            max-width: 50%;
        }

        .hero-text h1 {
            font-size: 64px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .hero-text p {
            color: #ccc;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .cta-button {
            background-color: #C3B8B8;
            color: white;
            padding: 20px 70px;
            border: none;
            border-radius: 15px;
            font-size: 20px;
            cursor: pointer;
            margin-top: 30px;
        }

        .cta-button:hover {
            background-color: #D9D9D9;
        }

       .hero-image {
    width: 100%;
    height: 100vh; /* atau sesuai tinggi yang kamu mau */
    margin-top: -575px;
     transform: translateX(410px);
    background-image:
        linear-gradient(to left, rgba(0, 0, 0, 0) 60%, black 100%),
        linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, black 650px), /* dari bawah */
        url('/images/wisatakeluarga.png');
     background-repeat: no-repeat;       /* <== Hentikan pengulangan gambar */
    background-size: 86%;            /* <== Pastikan gambar menutupi seluruh container */
    background-position: center;
       }


        /* Separator */
        .separator {
            position: relative;
            margin: 0 40px 80px 190px;
            border-color: #D9D9D9;
            width: 1250px;
            top: -220px;
            right: 50px;
            z-index: 1;
        }

        /* Cards */
        .card-grid {
            position: relative;
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 kolom tetap */
            column-gap: -80px;  /* jarak antar kolom */
            row-gap: 60px;     /* jarak antar baris */
            top: -220px;
            left: -30px;
            padding: 0 100px 80px;
        }

        .card {
            width: 270px; /* Lebar card */
    height: 400px; /* Menyesuaikan tinggi */
    border-radius: 15px; /* Membuat sudut lebih halus */
    margin-left: 60px;
    overflow: hidden;
    text-align: center;
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
             box-shadow: 0px 4px 15px rgba(255, 255, 255, 0.2);
        }

        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-body {
             position: absolute;
    bottom: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.6); /* Warna hitam dengan transparansi */
    padding: 3px 10px;
    color: white;
    text-align: center;
        }

        .card-body h3 {
  font-size: 11px;
  margin-left: 8px;
   text-align: left;
  font-weight: bold;
  color: #fff;
}

.info-item {
  display: flex;
  align-items: center;
  margin-bottom: 0.3rem;
  color: #fff;
}

.info-item .icon {
  margin-right: 0.5rem;
  font-size: 1rem;
}

.info-item .text {
  font-size: 6px;
}


        .distance {
            font-size: 0.85rem;
            color: #666;
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

        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                text-align: center;
            }

            .hero-text, .hero-image {
                max-width: 100%;
            }

            .navbar {
                flex-direction: column;
                gap: 10px;
            }

            .navbar-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
        @media (max-width: 1024px) {
  .container, .main-content { padding: 1rem; }
}
@media (max-width: 768px) {
  .container, .main-content { padding: 0.5rem; }
  .card, .wisata-card, .detail-section { flex-direction: column; max-width: 100vw; }
  img, .wisata-img { max-width: 100%; height: auto; }
  .btn, button { font-size: 0.95rem; padding: 0.5rem 1rem; }
}
@media (max-width: 480px) {
  .container, .main-content { padding: 0.2rem; }
  .card, .wisata-card, .detail-section { flex-direction: column; max-width: 100vw; }
  img, .wisata-img { max-width: 100%; height: auto; }
  .btn, button { font-size: 0.9rem; padding: 0.4rem 0.7rem; }
}
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-links">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="#destinations">Destinasi</a>
            <a href="#">Rekomendasi AI</a>
            <a href="#">Transportasi</a>
            <a href="#">Komunitas</a>
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


    <!-- Hero -->
    <section class="hero">
        <div class="hero-text">
            <h1>Mulai<br>Perjalananmu<br>Lewat Rumah!</h1>
            <p>Setiap destinasi punya kehangatan, dan kehangatan<br>diraih dengan keluarga</p>
            <button class="cta-button">Pilih kota</button>
        </div>
        <div class="hero-image">
        </div>
    </section>

    <hr class="separator">

    <!-- Cards -->
    <section class="card-grid">
        <a href="{{ route('wisatakeluarga.showdetailtamanmini') }}">
        <div class="card">
            <img src="{{ asset('images/tamanmini.png') }}" alt="Taman Mini Indonesia Indah">
            <div class="card-body">
                <h3>Taman Mini Indonesia Indah</h3>
                <div class="info-item">
                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                    <span class="text">Cisarua, Bogor</span>
                </div>
                <div class="info-item">
                    <span class="icon">🕒</span>
                    <span class="text">09.00 - 17.00 WIB</span>
                </div>
            </div>
        </div>
    </a>
    <a href="{{ route('wisatakeluarga.showdetailjatimpark') }}">
        <div class="card">
            <img src="{{ asset('images/jatimpark.png') }}" alt="Jatim Park Batu, Malang">
            <div class="card-body">
                <h3>Jatim Park Batu, Malang/h3>
                <div class="info-item">
                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                    <span class="text">Bandung, Jawa Barat</span>
                </div>
                <div class="info-item">
                    <span class="icon">🕒</span>
                    <span class="text">10.00 - 20.00 WIB</span>
                </div>
            </div>
        </div>
    </a>
    <a href="{{ route('wisatakeluarga.showdetailtransstudio') }}">
        <div class="card">
            <img src="{{ asset('images/transstudio.png') }}" alt="Trans Studio Bandung">
            <div class="card-body">
                <h3>Trans Studio Bandung</h3>
                <div class="info-item">
                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                    <span class="text">Jakarta Selatan</span>
                </div>
                <div class="info-item">
                    <span class="icon">🕒</span>
                    <span class="text">10.00 - 18.00 WIB</span>
                </div>
            </div>
        </div>
    </a>
    <a href="{{ route('wisatakeluarga.showdetailtamansafari') }}">
        <div class="card">
            <img src="{{ asset('images/tamansafari.png') }}" alt="Taman Safari Indonesia">
            <div class="card-body">
                <h3>Taman Safari</h3>
                <div class="info-item">
                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                    <span class="text">Batu, Jawa Timur</span>
                </div>
                <div class="info-item">
                    <span class="icon">🕒</span>
                    <span class="text">08.00 - 17.00 WIB</span>
                </div>
            </div>
        </div>
    </a>
    <a href="{{ route('wisatakeluarga.showdetailthegreatasia') }}">
        <div class="card">
            <img src="{{ asset('images/thegreat.png') }}" alt="The Great Asia Africa">
            <div class="card-body">
                <h3>The Great Asia Africa</h3>
                <div class="info-item">
                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                    <span class="text">Jakarta Timur</span>
                </div>
                <div class="info-item">
                    <span class="icon">🕒</span>
                    <span class="text">07.00 - 17.00 WIB</span>
                </div>
            </div>
        </div>
    </a>
    <a href="{{ route('wisatakeluarga.showdetailpantaisanur') }}">
        <div class="card">
            <img src="{{ asset('images/pantaisanur.png') }}" alt="Pantai Sanur, Bali">
            <div class="card-body">
                <h3>Pantai Sanur, Bali</h3>
                <div class="info-item">
                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                    <span class="text">Yogyakarta</span>
                </div>
                <div class="info-item">
                    <span class="icon">🕒</span>
                    <span class="text">08.00 - 16.00 WIB</span>
                </div>
            </div>
        </div>
    </a>
    <a href="{{ route('wisatakeluarga.showdetailtamanpintar') }}">
        <div class="card">
            <img src="{{ asset('images/tamanpintar.png') }}" alt="Taman Pintar Yogyakarta">
            <div class="card-body">
                <h3>Taman Pintar, Yogyakarta</h3>
                <div class="info-item">
                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                    <span class="text">Ancol, Jakarta Utara</span>
                </div>
                <div class="info-item">
                    <span class="icon">🕒</span>
                    <span class="text">09.00 - 18.00 WIB</span>
                </div>
            </div>
        </div>
    </a>
    <a href="{{ route('wisatakeluarga.showdetaildufan') }}">
        <div class="card">
            <img src="{{ asset('images/dufan.png') }}" alt="Dufan, Ancol">
            <div class="card-body">
                <h3>Dufan, Ancol</h3>
                <div class="info-item">
                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                    <span class="text">Ancol, Jakarta Utara</span>
                </div>
                <div class="info-item">
                    <span class="icon">🕒</span>
                    <span class="text">08.00 - 17.00 WIB</span>
                </div>
            </div>
        </div>
    </a>
    </section>
@auth
    @if(auth()->user()->role === 'guide' || auth()->user()->role === 'admin')
        <a href="/tambahdestinasi" title="Tambah Destinasi" style="position: fixed; bottom: 32px; right: 32px; background: #022059; color: #fff; width: 56px; height: 56px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; box-shadow: 0 4px 16px rgba(2,32,89,0.2); z-index: 999; text-decoration: none;">
            +
        </a>
    @endif
@endauth
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
