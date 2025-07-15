<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visit Ease</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
      background-color: #000;
      color: white;
      overflow-x: hidden;
      position: relative;
      background: #000 url('/images/Ellipse59.png') no-repeat center center fixed;
      background-size: cover;
    }

    .navbar {
      position: absolute;
      top: -150px;
      left: -20px;
      width: 100%;
      padding: 5px 10px; /* tambahkan padding horizontal */
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), transparent);
      z-index: 1000;
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

    .hero {
      text-align: center;
      padding: 60px 24px 32px;
      background: radial-gradient(circle, #8e2de2 0%, #000 100%);
    }

    .hero h1 {
      font-size: 40px;
      font-weight: bold;
    }

    .hero p {
      color: #ccc;
      margin-bottom: 24px;
    }

    .ai-box {
      background: #1e1e1e;
      border-radius: 16px;
      padding: 24px;
      max-width: 800px;
      margin: auto;
    }

    textarea {
      width: 95%;
      height: 120px;
      background: #2b2b2b;
      color: white;
      border: none;
      border-radius: 12px;
      padding: 16px;
      resize: none;
      font-size: 16px;
    }

    .send-btn {
      margin-top: 12px;
      float: right;
      background: #333;
      border: none;
      color: white;
      padding: 10px 14px;
      border-radius: 8px;
      cursor: pointer;
    }

    .suggestions {
      margin-top: 48px;
      display: flex;
      justify-content: center;
      gap: 12px;
      flex-wrap: wrap;
    }

    .suggestions button {
      background: #333;
      border: none;
      color: white;
      padding: 10px 20px;
      border-radius: 24px;
      cursor: pointer;
    }

    .results {
      padding: 40px 60px;
    }

    .results h2 {
      margin-bottom: 24px;
    }

    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 20px;
    }

    .card {
      background: #1a1a1a;
      border-radius: 16px;
      overflow: hidden;
      text-align: center;
    }

    .card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .card-text {
      padding: 12px;
    }

    .card-text h3 {
      margin: 4px 0;
    }

    .card-text p {
      color: #a0a0a0;
      font-size: 14px;
    }

    .rekomendasi-hero {
      text-align: center;
      margin-top: 150px;
      margin-bottom: 40px;
    }

    .rekomendasi-hero-title {
      font-size: 48px;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 2px;
      color: #fff;
      text-shadow: 0 0 32px #a259ff, 0 0 8px #a259ff;
      margin-bottom: 30px;
    }

    .rekomendasi-hero-subtitle {
      font-size: 18px;
      color: #ccc;
      margin-bottom: 32px;
    }

    .rekomendasi-chatbox {
      background: #23272f;
      border-radius: 16px;
      max-width: 900px;
      margin: 0 auto 32px auto;
      padding: 32px 32px 24px 32px;
      box-shadow: 0 0 32px 0 #a259ff33;
      display: flex;
      flex-direction: column;
      align-items: stretch;
    }

    .rekomendasi-chatbox textarea {
      background: #181a20;
      color: #fff;
      border: none;
      border-radius: 12px;
      padding: 18px 20px;
      font-size: 18px;
      min-height: 90px;
      resize: none;
      margin-bottom: 18px;
      outline: none;
    }

    .rekomendasi-chatbox-row {
      display: flex;
      align-items: center;
      justify-content: flex-end;
    }

    .rekomendasi-chatbox-send {
      background: none;
      border: none;
      color: #a259ff;
      font-size: 36px;
      cursor: pointer;
      margin-left: 8px;
      transition: color 0.2s;
    }

    .rekomendasi-chatbox-send:hover {
      color: #fff;
    }

    .rekomendasi-suggestions {
      display: flex;
      gap: 18px;
      margin-top: 18px;
      flex-wrap: wrap;
      justify-content: center;
    }

    .rekomendasi-suggestion-btn {
      background: #44474f;
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 12px 28px;
      font-size: 16px;
      margin-bottom: 8px;
      cursor: pointer;
      transition: background 0.2s, color 0.2s;
    }

    .rekomendasi-suggestion-btn:hover {
      background: #a259ff;
      color: #fff;
    }

    .error-message {
      background: #ff4444;
      color: white;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 20px;
      text-align: center;
    }

    .success-message {
      background: #44ff44;
      color: white;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 20px;
      text-align: center;
    }

    .recommendation-list {
      background: #1a1a1a;
      border-radius: 16px;
      padding: 24px;
      margin: 20px auto;
      max-width: 900px;
    }

    .recommendation-item {
      background: #2b2b2b;
      border-radius: 12px;
      padding: 16px;
      margin-bottom: 12px;
      border-left: 4px solid #a259ff;
    }

    .recommendation-item:last-child {
      margin-bottom: 0;
    }

    .loading {
      text-align: center;
      padding: 20px;
      color: #a259ff;
    }

    @media (max-width: 700px) {
      .rekomendasi-hero-title { font-size: 32px; }
      .rekomendasi-chatbox { padding: 16px 6px 12px 6px; }
      .rekomendasi-suggestion-btn { padding: 10px 12px; font-size: 14px; }
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

    .textarea-wrapper {
      position: relative;
      width: 100%;
    }
    .textarea-wrapper textarea {
      width: 100%;
      padding-right: 60px; /* ruang untuk tombol kirim */
      box-sizing: border-box;
      height: 160px; /* diperbesar */
    }
    .fab-send-inside {
      position: absolute;
      bottom: 28px; /* dinaikkan */
      right: 20px;
      width: 44px;
      height: 44px;
      background: #a259ff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 22px;
      border: none;
      box-shadow: 0 2px 8px #0002;
      cursor: pointer;
      transition: background 0.2s, color 0.2s;
      z-index: 2;
    }
    .fab-send-inside:hover {
      background: #fff;
      color: #a259ff;
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

    <main>
        <section class="rekomendasi-hero">
            <div class="rekomendasi-hero-title">BUTUH SARAN?<br>TANYAKAN DISINI!</div>
            <div class="rekomendasi-hero-subtitle">
                Mau cari destinasi, kuliner, atau transportasi? Semua bisa kamu tanyakan ke kami
            </div>
        </section>

        <section class="rekomendasi-chatbox">
            <form method="POST" action="{{ route('rekomendasi.process') }}">
                @csrf
                <div class="textarea-wrapper">
                    <textarea placeholder="Tanyakan apa saja" name="pertanyaan">{{ $pertanyaan ?? '' }}</textarea>
                    <button type="submit" class="fab-send-inside" title="Kirim">
                        <i class="fas fa-location-arrow"></i>
                    </button>
                </div>
            </form>
            <div class="rekomendasi-suggestions">
                @if(isset($suggestions) && count($suggestions) > 0)
                    @foreach($suggestions as $suggestion)
                        <button class="rekomendasi-suggestion-btn" onclick="setQuestion('{{ $suggestion }}')">{{ $suggestion }}</button>
                    @endforeach
                @else
                    <button class="rekomendasi-suggestion-btn" onclick="setQuestion('Lagi pengen makanan berkuah')">Lagi pengen makanan berkuah</button>
                    <button class="rekomendasi-suggestion-btn" onclick="setQuestion('Wisata Budaya di Bandung')">Wisata Budaya di Bandung</button>
                    <button class="rekomendasi-suggestion-btn" onclick="setQuestion('Rekomendasi wisata keluarga')">Rekomendasi wisata keluarga</button>
                @endif
            </div>

        @if(isset($rekomendasi) && !empty($rekomendasi))
            <section class="recommendation-list">
                <h2>Rekomendasi untuk: "{{ $pertanyaan }}"</h2>
                <div class="card-grid">
    @foreach($rekomendasi as $item)
    <div class="rekomendasi-item" style="margin-bottom: 20px;">
        @if(!empty($item['image']))
            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" style="width: 100%; max-width: 400px; border-radius: 8px;">
        @endif
        <h4>{{ $item['title'] }}</h4>
        <p>{{ $item['desc'] }}</p>
    </div>
    @endforeach
</div>
            </section>
        @endif

        @if(isset($pertanyaan) && empty($rekomendasi))
            <section class="results">
                <h2>Menampilkan Wisata Budaya di Bandung</h2>
                <div class="card-grid">
                    @for ($i = 0; $i < 4; $i++)
                    <div class="card">
                        <img src="{{ asset('images/borobudur.jpg') }}" alt="Wisata Budaya" />
                        <div class="card-text">
                            <h3>Wisata Budaya</h3>
                            <p>Candi & Situs Sejarah</p>
                        </div>
                    </div>
                    @endfor
                </div>
            </section>
        @endif
    </main>

    <script>
        // Deteksi login dari Blade
        var isLoggedIn = @auth true @else false @endauth;

        function setQuestion(question) {
            document.querySelector('textarea[name="pertanyaan"]').value = question;
        }

        // Fungsi untuk update suggestions secara realtime
        function updateSuggestions() {
            fetch('/rekomendasi/suggestions')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const suggestionsContainer = document.querySelector('.rekomendasi-suggestions');
                        suggestionsContainer.innerHTML = '';

                        data.suggestions.forEach(suggestion => {
                            const button = document.createElement('button');
                            button.className = 'rekomendasi-suggestion-btn';
                            button.textContent = suggestion;
                            button.onclick = () => setQuestion(suggestion);
                            suggestionsContainer.appendChild(button);
                        });
                    }
                })
                .catch(error => {
                    console.log('Failed to update suggestions:', error);
                });
        }

        // Update suggestions setiap 30 detik
        setInterval(updateSuggestions, 30000);

        // Update suggestions setelah form submission
        document.querySelector('form').addEventListener('submit', function() {
            // Update suggestions setelah 2 detik (memberikan waktu untuk proses)
            setTimeout(updateSuggestions, 2000);
        });

        // Update suggestions saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Update suggestions setelah 5 detik pertama
            setTimeout(updateSuggestions, 5000);

            // Cegah submit jika belum login
            var form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                if (!isLoggedIn) {
                    e.preventDefault();
                    window.location.href = '/login';
                    return false;
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
