<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Visit Ease - Wisata Budaya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: sans-serif;
      background-color: #000;
      color: #fff;
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


    /* HERO */
    .hero-section {
      position: relative;
      width: 100%;
      height: 200vh;
      overflow: hidden;
      z-index: 1;
    }

    .hero-image {
      width: 100vw;
      height: 130vh;
      object-fit: cover;
      filter: brightness(0.7);
      z-index: 1;
    }


.top-gradient-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 160px; /* Sesuaikan tinggi gradasi hitam */
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), transparent);
  z-index: 3;
  pointer-events: none;
}

.hero-title {
  position: absolute;
  top: 60%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 30px;
  font-weight: bold;
  text-align: center;
  padding: 12px 24px;
  border-radius: 10px;
  z-index: 4;
}

.hero-title::after {
  content: "";
  display: block;
  width: 1250px;
  height: 3px;
  background: rgba(255, 255, 255, 0.6);
  margin: 12px auto 0;
  border-radius: 2px;
}

.section-divider {
  border: none;
  height: 2px;
  background: rgba(255, 255, 255, 0.4); /* warna putih transparan */
  margin: 24px 0;
}

    /* CONTENT */
    .content {
  position: relative; /* penting agar z-index bekerja */
  z-index: 5; /* lebih tinggi dari .hero-image */
  margin-top: -630px; /* atur sesuai kebutuhan */
  padding: 50px 135px;
}

    h1 {
      font-size: 64px;
      font-weight: 600;
      margin-bottom: 16px;
    }

    .intro {
      max-width: 600px;
      margin-bottom: 60px;
      font-size: 20px;
      color: #ccc;
    }

    /* Kuliner Grid */
    .budaya-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
      gap: 16px;
      margin-bottom: 48px;
    }

    .budaya-card {
    position: relative;
      background: #111;
      border-radius: 12px;
      overflow: hidden;
      text-align: center;
    }

    .budaya-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .budaya-card p {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  font-size : 20px;
  background: rgba(0, 0, 0, 0.5); /* transparan */
  color: white;
  padding: 20px 0;
  font-weight: bold;
  z-index: 2;
}

    /* Info Section */
    .info-section {
      display: flex;
      flex-wrap: wrap;
      gap: 32px;
      background: #1a1a1a;
      padding: 24px;
      border-radius: 16px;
    }

.info-left ul li {
  display: flex;
  align-items: center;
  gap: 80px; /* atur jarak label dan jam */
  padding: 4px 0;
}

.label {
  min-width: 180px; /* agar rata kiri tapi tetap sejajar */
}

.jam {
  font-weight: bold;
}

.fasilitas-icons {
  display: flex;
  gap: 24px; /* Jarak antar ikon */
  margin-top: 12px;
  margin-bottom: 32px;
}

.fasilitas-icons img:hover {
  transform: scale(1.05); /* efek hover */
}

/* Harga Mulai Dari */
.harga {
  margin-top: 32px;
  font-size: 18px;
  font-weight: 600;
  color: #fff;
}

.harga span {
  color: red;
  font-weight: bold;
}


    .info-left,
    .info-right {
      flex: 1;
      min-width: 300px;
    }

    .info-left {
  flex: 1;
  min-width: 300px;
  padding-right: 5px;
  border-right: 1px solid rgba(255, 255, 255, 0.3);
}

    .fasilitas-icons span {
      margin-right: 12px;
      font-size: 24px;
    }

    .info-left ul {
      list-style: none;
      margin-top: 16px;
      margin-bottom: 16px;
    }

    .harga span {
      color: red;
      font-weight: bold;
    }

    .review-card {
  background: #fff;
  padding: 24px;
  border-radius: 16px;
  margin-bottom: 24px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  color: #333;
}

.review-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 12px;
}

.avatar {
  width: 40px;
  height: 40px;
  border-radius: 10%;
  margin-right: 12px;
  object-fit: cover;
}

.review-header strong {
  flex-grow: 1;
  margin-left: 8px;
}

.rating {
  background-color: red;
  color: white;
  font-weight: bold;
  font-size: 14px;
  padding: 4px 8px;
  border-radius: 6px;
  display: inline-block;
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


<section class="hero-section">
  <img src="{{ asset('images/museummajapahit.png') }}" class="hero-image" alt="Museum Majapahit">
  <h2 class="hero-title">Museum Majapahit</h2>
</section>

  <!-- CONTENT -->
  <main class="content">
    <h1>PANDUAN WISATA <br> BUDAYA</h1>
    <p class="intro">
      Telusuri jejak kejayaan Kerajaan Majapahit di Museum Majapahit, tempat bersejarah yang menyimpan berbagai peninggalan dan artefak kuno. <br>
      Rasakan atmosfer budaya dan sejarah di salah satu destinasi wisata budaya paling penting di Jawa Timur.
    </p>

    <!-- KULINER CARDS -->
    <div class="budaya-grid">
      <div class="budaya-card"><img src="{{ asset('images/pecel.png') }}"><p>Pecel Sayur</p></div>
      <div class="budaya-card"><img src="{{ asset('images/Sate.png') }}"><p>Sate Kere</p></div>
      <div class="budaya-card"><img src="{{ asset('images/Gudeg.png') }}"><p>Gudeg</p></div>
      <div class="budaya-card"><img src="{{ asset('images/Jenang.png') }}"><p>Jenang Sumsum</p></div>
    </div>

    <!-- INFO SECTION -->
    <div class="info-section">
      <div class="info-left">
        <h3>Fasilitas</h3>
        <div class="fasilitas-icons">
            <img src="{{ asset('images/Musholla.png') }}" alt="Musholla" />
            <img src="{{ asset('images/Parkir.png') }}" alt="Parkir" />
            <img src="{{ asset('images/Toilet.png') }}" alt="Toilet" />
        </div>
        <hr class="section-divider">

        <h3>Waktu</h3>
        <ul>
  <li><span class="label">Waktu terbaik</span> <span class="jam">08.00 - 10.00</span></li>
  <li><span class="label">Mulai ramai</span> <span class="jam">10.00 - 12.00</span></li>
  <li><span class="label">Padat pengunjung</span> <span class="jam">12.00 - 14.00</span></li>
  <li><span class="label">Menjelang tutup</span> <span class="jam">14.00 - 16.00</span></li>
</ul>
        <hr class="section-divider">

        <p class="harga">Harga mulai dari <br> <span>Rp. 10.000</span></p>
      </div>

      <div class="info-right">
  <h3>Review Pengunjung</h3>

  <div class="review-card">
    <div class="review-header">
      <img src="{{ asset('images/avatar1.png') }}" alt="Avatar" class="avatar">
      <strong>Nico Robin</strong>
      <span class="rating">5.0/5.0</span>
    </div>
    <p>Rasa khas dan suasananya luar biasa. Salah satu pengalaman kuliner terbaik!</p>
  </div>

  <div class="review-card">
    <div class="review-header">
      <img src="{{ asset('images/avatar2.png') }}" alt="Avatar" class="avatar">
      <strong>Nico Robin</strong>
      <span class="rating">5.0/5.0</span>
    </div>
    <p>Layaknya surga kuliner! Semua makanan otentik dan murah. Wajib coba!</p>
  </div>

    </div>
  </main>
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

