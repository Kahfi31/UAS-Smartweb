<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - VisitEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
            z-index: -1;
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(1deg); }
            66% { transform: translateY(10px) rotate(-1deg); }
        }



        /* Main Content */
        .main-content {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .profile-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            padding: 3rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
        }

        .profile-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .profile-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .profile-subtitle {
            color: #6b7280;
            font-size: 1.1rem;
            font-weight: 500;
        }

        /* Avatar Section */
        .avatar-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 3rem;
        }

        .avatar-container {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .avatar-preview {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 6px solid #fff;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .avatar-preview:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .avatar-upload {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .avatar-upload:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .avatar-input {
            display: none;
        }

        .avatar-hint {
            color: #6b7280;
            font-size: 0.9rem;
            text-align: center;
            font-weight: 500;
        }

        /* Form */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            background: white;
            transform: translateY(-2px);
        }

        .form-input:disabled {
            background-color: #f9fafb;
            color: #6b7280;
            cursor: not-allowed;
        }

        .form-input.readonly {
            background-color: #f8fafc;
            color: #64748b;
            border-color: #e2e8f0;
        }

        /* Button */
        .btn {
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        }

        .btn-center {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
        }

        /* Messages */
        .success-message {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 1.25rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            border: none;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
            animation: slideIn 0.5s ease;
        }

        .error-message {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            padding: 1.25rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            border: none;
            box-shadow: 0 10px 25px rgba(239, 68, 68, 0.3);
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .profile-card {
                padding: 2rem;
                margin: 1rem;
            }

            .main-content {
                margin: 1rem auto;
            }

            .profile-title {
                font-size: 2rem;
            }

            .avatar-preview {
                width: 120px;
                height: 120px;
            }
        }

        /* Loading animation */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>


    <!-- Main Content -->
    <div class="main-content">
        <div class="profile-card">
            <!-- Profile Header -->
            <div class="profile-header">
                <h2 class="profile-title">Profil Saya</h2>
                <p class="profile-subtitle">Kelola informasi profil Anda dengan mudah</p>
            </div>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="success-message">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    <ul style="margin-left: 1rem;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Profile Form -->
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" id="profileForm">
                @csrf
                @method('PATCH')

                <!-- Avatar Section -->
                <div class="avatar-section">
                    <div class="avatar-container">
                        <img id="avatarPreview"
                             src="{{ $user->avatar ? asset('storage/avatars/'.$user->avatar) : asset('images/avatar.jpg') }}"
                             alt="Avatar"
                             class="avatar-preview">
                        <label for="avatar" class="avatar-upload">
                            <i class="fas fa-camera"></i>
                        </label>
                        <input type="file"
                               id="avatar"
                               name="avatar"
                               class="avatar-input"
                               accept="image/*"
                               onchange="previewAvatar(event)">
                    </div>
                    <p class="avatar-hint">Klik ikon kamera untuk mengubah foto profil</p>
                </div>

                <!-- Form Fields -->
                <div class="form-grid">
                    <div class="form-group">
                        <label for="first_name" class="form-label">Nama Depan</label>
                        <input type="text"
                               id="first_name"
                               name="first_name"
                               class="form-input"
                               value="{{ old('first_name', $user->first_name) }}"
                               required>
                        @error('first_name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="form-label">Nama Belakang</label>
                        <input type="text"
                               id="last_name"
                               name="last_name"
                               class="form-input"
                               value="{{ old('last_name', $user->last_name) }}"
                               required>
                        @error('last_name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                           id="email"
                           name="email"
                           class="form-input readonly"
                           value="{{ old('email', $user->email) }}"
                           readonly>
                    <small class="avatar-hint">Email tidak dapat diubah</small>
                </div>

                <div class="form-group full-width">
                    <label for="role" class="form-label">Role</label>
                    <input type="text"
                           id="role"
                           name="role"
                           class="form-input readonly"
                           value="{{ old('role', $user->role) }}"
                           readonly>
                    <small class="avatar-hint">Role tidak dapat diubah</small>
                </div>

                <div class="form-group full-width">
                    <label for="pin" class="form-label">PIN</label>
                    <input type="text"
                           id="pin"
                           name="pin"
                           class="form-input readonly"
                           value="{{ old('pin', $user->pin) }}"
                           readonly>
                    <small class="avatar-hint">PIN tidak dapat diubah</small>
                </div>

                <!-- Submit Button -->
                <div class="btn-center">
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewAvatar(event) {
            const [file] = event.target.files;
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatarPreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        // Form submission with loading state
        document.getElementById('profileForm').addEventListener('submit', function() {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
            submitBtn.classList.add('loading');
        });

        // Auto hide success message with fade out
        setTimeout(() => {
            const successMessage = document.querySelector('.success-message');
            if (successMessage) {
                successMessage.style.transition = 'opacity 0.5s ease';
                successMessage.style.opacity = '0';
                setTimeout(() => {
                    successMessage.remove();
                }, 500);
            }
        }, 5000);

        // Auto hide error message with fade out
        setTimeout(() => {
            const errorMessage = document.querySelector('.error-message');
            if (errorMessage) {
                errorMessage.style.transition = 'opacity 0.5s ease';
                errorMessage.style.opacity = '0';
                setTimeout(() => {
                    errorMessage.remove();
                }, 500);
            }
        }, 8000);

        // Add smooth scroll behavior
        document.documentElement.style.scrollBehavior = 'smooth';
    </script>
</body>
</html>
