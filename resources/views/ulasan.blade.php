<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Tempat Wisata | VisitEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header Section */
        .header {
            text-align: center;
            padding: 60px 20px 40px;
            color: white;
        }

        .header h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .header p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            opacity: 0.9;
            line-height: 1.6;
        }

        /* Success Message */
        .success-message {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 500;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);
        }

        /* Filter Section */
        .filter-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 40px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }

        .filter-section h2 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 25px;
            color: #333;
            text-align: center;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
        }

        .filter-group label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #555;
        }

        .filter-group select,
        .filter-group input {
            padding: 12px 16px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .filter-group select:focus,
        .filter-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        /* Places Grid */
        .places-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .place-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .place-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .place-image {
            height: 200px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .place-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .place-image .no-image {
            color: rgba(255, 255, 255, 0.8);
            text-align: center;
        }

        .place-image .no-image svg {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
        }

        .place-content {
            padding: 25px;
        }

        .place-header {
            display: flex;
            justify-content: flex-end;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .rating-display {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .stars {
            display: flex;
            gap: 2px;
        }

        .star {
            color: #ffd700;
            font-size: 1rem;
        }

        .star.empty {
            color: #ddd;
        }

        .rating-text {
            font-size: 0.9rem;
            color: #666;
            margin-left: 5px;
        }

        .place-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: #333;
        }

        .place-location {
            font-size: 0.95rem;
            color: #666;
            margin-bottom: 15px;
        }

        .place-review {
            font-size: 0.9rem;
            color: #555;
            line-height: 1.5;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .place-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .visit-date {
            font-size: 0.8rem;
            color: #888;
        }

        .rating-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .rating-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .already-rated {
            color: #4CAF50;
            font-weight: 600;
            font-size: 0.9rem;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }

        .empty-state svg {
            width: 80px;
            height: 80px;
            color: #ccc;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }

        .empty-state p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .cta-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 15px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .cta-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        /* Back to Home Button */
        .back-btn {
            position: fixed;
            top: 30px;
            left: 30px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            padding: 12px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .back-btn:hover {
            background: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .container { padding: 10px; }
            .header h1 { font-size: 2.2rem; }
        }
        @media (max-width: 768px) {
            .container { padding: 4px; }
            .header { padding: 24px 4px 16px; }
            .header h1 { font-size: 1.2rem; }
            .header p { font-size: 0.9rem; }
            .filter-section { padding: 10px; }
            .filter-grid { gap: 8px; }
            .places-grid { gap: 8px; }
            .place-card { padding: 8px; }
        }
        @media (max-width: 480px) {
            .container { padding: 2px; }
            .header { padding: 8px 2px 4px; }
            .header h1 { font-size: 0.9rem; }
            .header p { font-size: 0.7rem; }
            .filter-section { padding: 4px; }
            .filter-grid { gap: 4px; }
            .places-grid { gap: 4px; grid-template-columns: 1fr; }
            .place-card { padding: 4px; }
        }
    </style>
</head>
<body>
    <a href="{{ url('/') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Ulasan Tempat Wisata</h1>
            <p>Berikan rating dan ulasan untuk tempat-tempat yang sudah Anda kunjungi. Bagikan pengalaman Anda dengan traveler lainnya!</p>
        </div>

        @if(session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Filter Section -->
        <div class="filter-section">
            <h2><i class="fas fa-filter"></i> Filter Tempat</h2>
            <div class="filter-grid">

                <div class="filter-group">
                    <label for="rating"><i class="fas fa-star"></i> Rating</label>
                    <select id="rating">
                        <option value="">Semua Rating</option>
                        <option value="5">5 Bintang</option>
                        <option value="4">4 Bintang</option>
                        <option value="3">3 Bintang</option>
                        <option value="2">2 Bintang</option>
                        <option value="1">1 Bintang</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="search"><i class="fas fa-search"></i> Cari Tempat</label>
                    <input type="text" id="search" placeholder="Nama tempat...">
                </div>
            </div>
        </div>

        <!-- Places Grid -->
        <div class="places-grid" id="places-grid">
            @forelse($visitedPlaces as $place)
            <div class="place-card place-card-item"
                 data-rating="{{ $place->rating }}"
                 data-nama="{{ strtolower($place->nama_tempat) }}">

                <!-- Place Image -->
                <div class="place-image">
                    @if($place->gambar)
                        <img src="{{ asset('storage/' . $place->gambar) }}" alt="{{ $place->nama_tempat }}">
                    @else
                        <div class="no-image">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                            </svg>
                            <p>No Image</p>
                        </div>
                    @endif
                </div>

                <!-- Place Content -->
                <div class="place-content">
                    <div class="place-header">
                        @if($place->rating > 0)
                            <div class="rating-display">
                                <div class="stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star star {{ $i <= $place->rating ? '' : 'empty' }}"></i>
                                    @endfor
                                </div>
                                <span class="rating-text">({{ $place->rating }})</span>
                            </div>
                        @else
                            <span class="rating-text">Belum ada rating</span>
                        @endif
                    </div>

                    <h3 class="place-title">{{ $place->nama_tempat }}</h3>
                    <p class="place-location"><i class="fas fa-map-marker-alt"></i> {{ $place->lokasi }}</p>

                    @if($place->ulasan)
                        <p class="place-review">{{ $place->ulasan }}</p>
                    @endif

                    <div class="place-footer">
                        <span class="visit-date">
                            <i class="fas fa-calendar"></i> Dikunjungi: {{ $place->created_at->format('d M Y') }}
                        </span>
                        @if($place->rating == 0)
                            @auth
                                <a href="{{ route('ulasan.create', $place->id) }}" class="rating-btn">
                                    <i class="fas fa-star"></i> Beri Rating
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="rating-btn">
                                    <i class="fas fa-sign-in-alt"></i> Login untuk memberi rating
                                </a>
                            @endauth
                        @else
                            <span class="already-rated">
                                <i class="fas fa-check-circle"></i> Sudah diulas
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
                <h3>Belum ada tempat yang dikunjungi</h3>
                <p>Mulai dengan mencari rute transportasi ke tempat wisata favorit Anda!</p>
                <a href="{{ route('transportasi') }}" class="cta-btn">
                    <i class="fas fa-route"></i> Cari Transportasi
                </a>
            </div>
            @endforelse
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const ratingFilter = document.getElementById('rating');
        const searchFilter = document.getElementById('search');
        const placeCards = document.querySelectorAll('.place-card-item');

            function filterPlaces() {
        const selectedRating = ratingFilter.value;
        const searchTerm = searchFilter.value.toLowerCase();

        placeCards.forEach(card => {
            const rating = parseFloat(card.dataset.rating);
            const nama = card.dataset.nama;

            const ratingMatch = !selectedRating || rating >= parseInt(selectedRating);
            const searchMatch = !searchTerm || nama.includes(searchTerm);

            if (ratingMatch && searchMatch) {
                card.style.display = 'block';
                card.style.animation = 'fadeIn 0.5s ease-in';
            } else {
                card.style.display = 'none';
            }
        });
    }

    ratingFilter.addEventListener('change', filterPlaces);
    searchFilter.addEventListener('input', filterPlaces);

        // Add fadeIn animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
        `;
        document.head.appendChild(style);
    });
    </script>
</body>
</html>
