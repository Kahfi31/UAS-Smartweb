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
     transform: translateX(350px);
    background-image:
        linear-gradient(to left, rgba(0, 0, 0, 0) 60%, black 100%),
        linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, black 650px), /* dari bawah */
        url('/images/streetfood.png');
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


    <!-- Hero -->
    <section class="hero">
        <div class="hero-text">
            <h1>Mulai<br>Perjalananmu<br>Lewat Lidah!</h1>
            <p>Setiap destinasi punya rasa, dan setiap rasa<br>punya cerita</p>
            <button class="cta-button">Pilih kota</button>
        </div>
        <div class="hero-image">
        </div>
    </section>

    <hr class="separator">

    <!-- Cards -->
    <section class="card-grid">
        @for ($i = 0; $i < 8; $i++)
        <a href="{{ route('wisatakuliner.showdetail') }}">
            <div class="card">
                <img src="{{ asset('images/kuliner.png') }}" alt="Pasar">
               <div class="card-body">
  <h3>Pasar Beringharjo</h3>

  <div class="info-item">
    <span class="icon">📍</span>
    <span class="text">Jl. Margo Mulyo, Kawasan Malioboro, Yogyakarta</span>
  </div>

  <div class="info-item">
    <span class="icon">🕒</span>
    <span class="text">08.00 - 16.00 WIB Setiap hari</span>
  </div>
</div>
            </div>
    </a>
    @endfor
    </section>

@auth
    @if(auth()->user()->role === 'guide' || auth()->user()->role === 'admin')
        <a href="/tambahdestinasi" title="Tambah Destinasi" style="position: fixed; bottom: 32px; right: 32px; background: #022059; color: #fff; width: 56px; height: 56px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; box-shadow: 0 4px 16px rgba(2,32,89,0.2); z-index: 999; text-decoration: none;">
            +
        </a>
    @endif
@endauth

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
