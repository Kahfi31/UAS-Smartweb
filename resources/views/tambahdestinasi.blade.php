<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Destinasi - VisitEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
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
            padding: 5px 10px;
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

        .avatar {
            border-radius: 50%;
            width: 32px;
            height: 32px;
        }

        /* Main Content */
        .main-content {
            max-width: 900px;
            margin: 0 auto;
            padding: 200px 24px 40px;
        }

        /* Hero Section */
        .hero-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .hero-title {
            font-size: 48px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #fff;
            text-shadow: 0 0 32px #a259ff, 0 0 8px #a259ff;
            margin-bottom: 30px;
        }

        .hero-subtitle {
            font-size: 18px;
            color: #ccc;
            margin-bottom: 32px;
        }

        /* Form Container */
        .form-container {
            background: #23272f;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 0 32px 0 #a259ff33;
            margin-bottom: 32px;
        }

        .form-title {
            font-size: 24px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 24px;
            text-align: center;
        }

        /* Form Fields */
        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #fff;
            margin-bottom: 8px;
            font-size: 16px;
        }

        .form-input {
            width: 100%;
            background: #181a20;
            color: #fff;
            border: 2px solid #44474f;
            border-radius: 12px;
            padding: 16px 20px;
            font-size: 16px;
            transition: border-color 0.2s, box-shadow 0.2s;
            box-sizing: border-box;
        }

        .form-input:focus {
            outline: none;
            border-color: #a259ff;
            box-shadow: 0 0 0 3px rgba(162, 89, 255, 0.1);
        }

        .form-input::placeholder {
            color: #666;
        }

        .form-select {
            width: 100%;
            background: #181a20;
            color: #fff;
            border: 2px solid #44474f;
            border-radius: 12px;
            padding: 16px 20px;
            font-size: 16px;
            transition: border-color 0.2s;
            cursor: pointer;
        }

        .form-select:focus {
            outline: none;
            border-color: #a259ff;
        }

        .form-select option {
            background: #181a20;
            color: #fff;
        }

        .form-textarea {
            width: 100%;
            background: #181a20;
            color: #fff;
            border: 2px solid #44474f;
            border-radius: 12px;
            padding: 16px 20px;
            font-size: 16px;
            min-height: 120px;
            resize: vertical;
            transition: border-color 0.2s;
            font-family: 'Inter', sans-serif;
        }

        .form-textarea:focus {
            outline: none;
            border-color: #a259ff;
        }

        /* Location API Section */
        .location-section {
            background: #1a1a1a;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            border-left: 4px solid #a259ff;
        }

        .location-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .location-icon {
            color: #a259ff;
            font-size: 20px;
        }

        .location-title {
            font-weight: 600;
            color: #fff;
            font-size: 18px;
        }

        .location-input-group {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
        }

        .location-input {
            flex: 1;
            background: #2b2b2b;
            color: #fff;
            border: 1px solid #44474f;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 14px;
        }

        .location-input:focus {
            outline: none;
            border-color: #a259ff;
        }

        .location-btn {
            background: #a259ff;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .location-btn:hover {
            background: #8b4dff;
        }

        .location-btn:disabled {
            background: #44474f;
            cursor: not-allowed;
        }

        .location-results {
            background: #2b2b2b;
            border-radius: 8px;
            max-height: 200px;
            overflow-y: auto;
            display: none;
        }

        .location-result-item {
            padding: 12px 16px;
            border-bottom: 1px solid #44474f;
            cursor: pointer;
            transition: background 0.2s;
        }

        .location-result-item:hover {
            background: #44474f;
        }

        .location-result-item:last-child {
            border-bottom: none;
        }

        .location-result-name {
            font-weight: 600;
            color: #fff;
            margin-bottom: 4px;
        }

        .location-result-address {
            font-size: 14px;
            color: #ccc;
        }

        /* Submit Button */
        .submit-section {
            text-align: center;
            margin-top: 32px;
        }

        .submit-btn {
            background: #a259ff;
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 16px 40px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
            box-shadow: 0 4px 12px rgba(162, 89, 255, 0.3);
        }

        .submit-btn:hover {
            background: #8b4dff;
            transform: translateY(-2px);
        }

        .submit-btn:disabled {
            background: #44474f;
            cursor: not-allowed;
            transform: none;
        }

        /* Loading */
        .loading {
            display: none;
            text-align: center;
            padding: 20px;
            color: #a259ff;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #44474f;
            border-top: 4px solid #a259ff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 16px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Success/Error Messages */
        .message {
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            text-align: center;
            font-weight: 600;
        }

        .success-message {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .error-message {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 32px;
            }

            .form-container {
                padding: 24px 16px;
            }

            .location-input-group {
                flex-direction: column;
            }

            .navbar-links {
                gap: 50px;
                margin-left: 80px;
            }

            .navbar-links a {
                font-size: 16px;
            }
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


    <!-- Main Content -->
    <div class="main-content">
        <!-- Hero Section -->
        <section class="hero-section">
            <h1 class="hero-title">TAMBAH DESTINASI</h1>
            <p class="hero-subtitle">Tambah destinasi wisata baru ke dalam database kami</p>
        </section>

        <!-- Form Container -->
        <div class="form-container">
            <h2 class="form-title">Form Tambah Destinasi</h2>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="message success-message">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="message error-message">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('destinasi.store') }}" id="destinasiForm">
                @csrf

                <!-- Nama Wisata -->
                <div class="form-group">
                    <label for="nama" class="form-label">
                        <i class="fas fa-map-marker-alt"></i> Nama Wisata
                    </label>
                    <input type="text"
                           id="nama"
                           name="nama"
                           class="form-input"
                           placeholder="Masukkan nama destinasi wisata"
                           value="{{ old('nama') }}"
                           required>
                </div>

                <!-- Kategori Wisata -->
                <div class="form-group">
                    <label for="kategori" class="form-label">
                        <i class="fas fa-tags"></i> Kategori Wisata
                    </label>
                    <select id="kategori" name="kategori" class="form-select" required>
                        <option value="">Pilih kategori wisata</option>
                        <option value="wisata_alam" {{ old('kategori') == 'wisata_alam' ? 'selected' : '' }}>Wisata Alam</option>
                        <option value="wisata_budaya" {{ old('kategori') == 'wisata_budaya' ? 'selected' : '' }}>Wisata Budaya</option>
                        <option value="wisata_kuliner" {{ old('kategori') == 'wisata_kuliner' ? 'selected' : '' }}>Wisata Kuliner</option>
                        <option value="wisata_urban" {{ old('kategori') == 'wisata_urban' ? 'selected' : '' }}>Wisata Urban</option>
                        <option value="wisata_keluarga" {{ old('kategori') == 'wisata_keluarga' ? 'selected' : '' }}>Wisata Keluarga</option>
                    </select>
                </div>

                <!-- Lokasi (dari API) -->
                <div class="form-group">
                    <div class="location-section">
                        <div class="location-header">
                            <i class="fas fa-search-location location-icon"></i>
                            <span class="location-title">Lokasi Destinasi</span>
                        </div>

                        <div class="location-input-group">
                            <input type="text"
                                   id="locationSearch"
                                   class="location-input"
                                   placeholder="Cari lokasi destinasi..."
                                   autocomplete="off">
                            <button type="button"
                                    id="searchLocationBtn"
                                    class="location-btn">
                                <i class="fas fa-search"></i> Cari
                            </button>
                        </div>

                        <div id="locationResults" class="location-results"></div>

                        <input type="hidden" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required>
                        <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude') }}">
                        <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude') }}">
                    </div>
                </div>

                <!-- Jam Operasional -->
                <div class="form-group">
                    <label for="jam_operasional" class="form-label">
                        <i class="fas fa-clock"></i> Jam Operasional
                    </label>
                    <input type="text"
                           id="jam_operasional"
                           name="jam_operasional"
                           class="form-input"
                           placeholder="Contoh: 08:00 - 17:00 (Senin-Minggu)"
                           value="{{ old('jam_operasional') }}"
                           required>
                    <small class="avatar-hint">Format: Jam buka - Jam tutup (Hari operasional)</small>
                </div>

                <!-- Submit Button -->
                <div class="submit-section">
                    <button type="submit" class="submit-btn" id="submitBtn">
                        <i class="fas fa-plus"></i> Tambah Destinasi
                    </button>
                </div>
            </form>

            <!-- Loading -->
            <div class="loading" id="loading">
                <div class="spinner"></div>
                <p>Memproses data...</p>
            </div>
        </div>
    </div>

    <script>
        // Location API functionality
        let searchTimeout;

        document.getElementById('locationSearch').addEventListener('input', function(e) {
            clearTimeout(searchTimeout);
            const query = e.target.value;

            if (query.length < 3) {
                hideLocationResults();
                return;
            }

            searchTimeout = setTimeout(() => {
                searchLocation(query);
            }, 500);
        });

        document.getElementById('searchLocationBtn').addEventListener('click', function() {
            const query = document.getElementById('locationSearch').value;
            if (query.length >= 3) {
                searchLocation(query);
            }
        });

        function searchLocation(query) {
    const resultsContainer = document.getElementById('locationResults');
    const searchBtn = document.getElementById('searchLocationBtn');

    // Show loading
    searchBtn.disabled = true;
    searchBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mencari...';

                    // Call our backend API which uses Nominatim
        fetch(`/tambahdestinasi/search-location?query=${encodeURIComponent(query)}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success && data.results) {
                    const results = data.results.map(item => ({
                        name: item.display_name || item.name,
                        address: item.full_address || item.address,
                        lat: parseFloat(item.lat),
                        lng: parseFloat(item.lon)
                    }));
                    displayLocationResults(results);
                } else {
                    throw new Error(data.message || 'No results found');
                }
            })
            .catch(error => {
                console.error('Error fetching location data:', error);
                // Fallback to mock data if API fails
                const mockResults = [
                    {
                        name: `${query} - Destinasi Wisata`,
                        address: `${query}, Indonesia`,
                        lat: -6.2088,
                        lng: 106.8456
                    }
                ];
                displayLocationResults(mockResults);
            })
            .finally(() => {
                // Reset button
                searchBtn.disabled = false;
                searchBtn.innerHTML = '<i class="fas fa-search"></i> Cari';
            });
}

function displayLocationResults(results) {
    const resultsContainer = document.getElementById('locationResults');
    resultsContainer.innerHTML = '';

    if (results.length === 0) {
        resultsContainer.innerHTML = '<div class="location-result-item">Tidak ada hasil ditemukan</div>';
    } else {
        results.forEach(result => {
            const item = document.createElement('div');
            item.className = 'location-result-item';
            item.innerHTML = `
                <div class="location-result-name">${result.name}</div>
                <div class="location-result-address">${result.address}</div>
            `;

            item.addEventListener('click', () => {
                selectLocation(result);
            });

            resultsContainer.appendChild(item);
        });
    }

    resultsContainer.style.display = 'block';
}

function selectLocation(location) {
    // Show only name in the visible input
    document.getElementById('locationSearch').value = location.name;

    // Store full data in hidden fields
    document.getElementById('lokasi').value = location.name;
    document.getElementById('latitude').value = location.lat;
    document.getElementById('longitude').value = location.lng;

    hideLocationResults();
}

        function hideLocationResults() {
            document.getElementById('locationResults').style.display = 'none';
        }

        // Form submission
        document.getElementById('destinasiForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            const loading = document.getElementById('loading');

            // Show loading
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
            loading.style.display = 'block';

            // Form will submit normally
        });

        // Hide location results when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.location-section')) {
                hideLocationResults();
            }
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
