<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beri Rating & Ulasan | VisitEase</title>
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
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            text-align: center;
            padding: 40px 20px;
            color: white;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        /* Form Container */
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Place Info */
        .place-info {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 5px solid #667eea;
        }

        .place-info h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }

        .place-info p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 15px;
        }



        /* Form Groups */
        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 10px;
            color: #555;
            font-size: 1rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 15px 18px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* Rating Section */
        .rating-section {
            text-align: center;
        }

        .rating-stars {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin: 15px 0;
        }

        .rating-star {
            font-size: 2.5rem;
            color: #ddd;
            cursor: pointer;
            transition: all 0.3s ease;
            background: none;
            border: none;
        }

        .rating-star:hover,
        .rating-star.active {
            color: #ffd700;
            transform: scale(1.1);
        }

        .rating-text {
            font-size: 1.1rem;
            color: #666;
            margin-top: 10px;
            font-weight: 500;
        }

        /* File Upload */
        .file-upload {
            border: 2px dashed #e1e5e9;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            background: #f8f9fa;
            cursor: pointer;
            position: relative;
        }

        .file-upload:hover {
            border-color: #667eea;
            background: #f0f2ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.1);
        }

        .file-upload input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-upload svg {
            width: 50px;
            height: 50px;
            color: #667eea;
            margin-bottom: 15px;
        }

        .file-upload p {
            color: #666;
            margin-bottom: 5px;
        }

        .file-upload .file-info {
            font-size: 0.9rem;
            color: #999;
        }

        .file-upload .upload-text {
            font-weight: 600;
            color: #667eea;
        }

        .file-upload .upload-hint {
            font-size: 0.85rem;
            color: #888;
            margin-top: 8px;
        }

        /* File preview styles */
        .file-preview {
            text-align: center;
            position: relative;
        }

        .file-preview img {
            max-width: 200px;
            max-height: 150px;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .file-preview img:hover {
            transform: scale(1.05);
        }

        .file-preview .file-name {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .file-preview .file-status {
            color: #4CAF50;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .change-file-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .change-file-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        /* Buttons */
        .button-group {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        /* Back Button */
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

        /* Error Messages */
        .error-message {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }

            .form-container {
                padding: 25px;
            }

            .button-group {
                flex-direction: column;
            }

            .back-btn {
                top: 20px;
                left: 20px;
                padding: 10px 16px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }

            .header {
                padding: 30px 15px;
            }

            .header h1 {
                font-size: 1.8rem;
            }

            .form-container {
                padding: 20px;
            }

            .place-info {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <a href="{{ route('ulasan.index') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Beri Rating & Ulasan</h1>
            <p>Bagikan pengalaman Anda di tempat wisata ini</p>
        </div>

        <!-- Form Container -->
        <div class="form-container">
            <!-- Place Info -->
            <div class="place-info">
                <h2>{{ $place->nama_tempat }}</h2>
                <p><i class="fas fa-map-marker-alt"></i> {{ $place->lokasi }}</p>
            </div>

            <form action="{{ route('ulasan.store', $place->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Rating Section -->
                <div class="form-group rating-section">
                    <label>Rating *</label>
                    <div class="rating-stars" id="rating-stars">
                        @for($i = 1; $i <= 5; $i++)
                            <button type="button" class="rating-star" data-rating="{{ $i }}">
                                ★
                            </button>
                        @endfor
                    </div>
                    <div class="rating-text" id="rating-text">Pilih rating</div>
                    <input type="hidden" name="rating" id="rating-input" required>
                    @error('rating')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Review Section -->
                <div class="form-group">
                    <label for="ulasan">Ulasan *</label>
                    <textarea id="ulasan" name="ulasan"
                              placeholder="Ceritakan pengalaman Anda di tempat ini... (minimal 10 karakter)" required>{{ old('ulasan') }}</textarea>
                    @error('ulasan')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Image Upload Section -->
                <div class="form-group">
                    <label><i class="fas fa-camera"></i> Foto Pengalaman (Opsional)</label>
                    <div class="file-upload" id="file-upload">
                        <input type="file" id="gambar_ulasan" name="gambar_ulasan" accept="image/*"/>
                        <svg fill="currentColor" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="upload-text">Klik untuk memilih foto</p>
                        <p class="upload-hint">atau drag & drop file gambar ke sini</p>
                        <p class="file-info">Format: PNG, JPG, GIF (Maksimal 2MB)</p>
                    </div>
                    @error('gambar_ulasan')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Submit Buttons -->
                <div class="button-group">
                    <a href="{{ route('ulasan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Kirim Ulasan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.rating-star');
        const ratingInput = document.getElementById('rating-input');
        const ratingText = document.getElementById('rating-text');
        let currentRating = 0;

        const ratingDescriptions = {
            1: 'Sangat Buruk',
            2: 'Buruk',
            3: 'Cukup',
            4: 'Bagus',
            5: 'Sangat Bagus'
        };

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = parseInt(this.dataset.rating);
                currentRating = rating;
                ratingInput.value = rating;
                updateStars(rating);
                ratingText.textContent = ratingDescriptions[rating];
            });

            star.addEventListener('mouseenter', function() {
                const rating = parseInt(this.dataset.rating);
                updateStars(rating);
            });

            star.addEventListener('mouseleave', function() {
                updateStars(currentRating);
            });
        });

        function updateStars(rating) {
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            });
        }

                // File upload preview
        const fileInput = document.getElementById('gambar_ulasan');
        const fileUpload = document.getElementById('file-upload');

        // Function to show file preview
        function showFilePreview(file) {
            if (file) {
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    alert('Silakan pilih file gambar (PNG, JPG, GIF)');
                    return;
                }

                // Validate file size (2MB = 2 * 1024 * 1024 bytes)
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar. Maksimal 2MB');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    fileUpload.innerHTML = `
                        <div class="file-preview">
                            <img src="${e.target.result}" alt="Preview">
                            <p class="file-name">${file.name}</p>
                            <p class="file-status">
                                <i class="fas fa-check-circle"></i> File berhasil dipilih
                            </p>
                            <button type="button" id="change-file" class="change-file-btn">
                                <i class="fas fa-edit"></i> Ganti Foto
                            </button>
                            <input type="file" id="gambar_ulasan" name="gambar_ulasan" accept="image/*" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
                        </div>
                    `;

                    // Add event listener for change file button
                    const changeFileBtn = document.getElementById('change-file');
                    if (changeFileBtn) {
                        changeFileBtn.addEventListener('click', function() {
                            document.getElementById('gambar_ulasan').click();
                        });
                    }
                };
                reader.readAsDataURL(file);
            }
        }

        // Handle file selection
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            showFilePreview(file);
        });

        // Drag and drop functionality
        fileUpload.addEventListener('dragover', function(e) {
            e.preventDefault();
            fileUpload.style.borderColor = '#667eea';
            fileUpload.style.background = '#f0f2ff';
            fileUpload.style.transform = 'translateY(-2px)';
        });

        fileUpload.addEventListener('dragleave', function(e) {
            e.preventDefault();
            fileUpload.style.borderColor = '#e1e5e9';
            fileUpload.style.background = '#f8f9fa';
            fileUpload.style.transform = 'translateY(0)';
        });

        fileUpload.addEventListener('drop', function(e) {
            e.preventDefault();
            fileUpload.style.borderColor = '#e1e5e9';
            fileUpload.style.background = '#f8f9fa';
            fileUpload.style.transform = 'translateY(0)';

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                const file = files[0];
                fileInput.files = files;
                showFilePreview(file);
            }
        });

        // Click to upload functionality
        fileUpload.addEventListener('click', function(e) {
            // Only trigger file input if clicking on the upload area, not on buttons
            if (!e.target.closest('button') && !e.target.closest('input')) {
                fileInput.click();
            }
        });
    });
    </script>
</body>
</html>
