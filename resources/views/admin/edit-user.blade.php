<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit User - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background-color: #f3f4f6;
        }

        /* Header */
        header {
            background-color: #022059;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 2rem;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar div a {
            margin-right: 1.5rem;
            text-decoration: none;
            color: #022059;
            font-weight: 500;
        }

        .navbar div a:hover {
            text-decoration: underline;
        }

        .login-button {
            text-decoration: none;
            background-color: #022059;
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-weight: 600;
        }

        .login-button:hover {
            background-color: #011437;
        }

        main {
            padding: 2rem;
        }

        .admin-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .edit-form {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .form-header {
            margin-bottom: 2rem;
        }

        .form-header h1 {
            color: #022059;
            margin: 0 0 0.5rem 0;
            font-size: 1.875rem;
            font-weight: 800;
        }

        .form-header p {
            color: #6b7280;
            margin: 0;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #374151;
            font-weight: 500;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: #022059;
            box-shadow: 0 0 0 3px rgba(2, 32, 89, 0.1);
        }

        .form-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 1rem;
            background-color: white;
            transition: border-color 0.2s;
        }

        .form-select:focus {
            outline: none;
            border-color: #022059;
            box-shadow: 0 0 0 3px rgba(2, 32, 89, 0.1);
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background-color: #022059;
            color: white;
        }

        .btn-primary:hover {
            background-color: #011437;
        }

        .btn-secondary {
            background-color: #6b7280;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
        }

        .error-message {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .success-message {
            background-color: #dcfce7;
            color: #166534;
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>VisitEase</h1>
    </header>

    <!-- Navbar -->
    <nav class="navbar">
        <div>
            <a href="/admin/tourist">Data Tourist</a>
            <a href="/admin/guide">Data Guide</a>
        </div>
        @auth
            <a href="/logout" class="login-button">Logout</a>
        @else
            <a href="/login" class="login-button">Login</a>
        @endauth
    </nav>

    <main>
        <div class="admin-container">
            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <div class="edit-form">
                <div class="form-header">
                    <h1>Edit User</h1>
                    <p>Perbarui informasi user {{ $user->first_name }} {{ $user->last_name }}</p>
                </div>

                <form action="/admin/user/{{ $user->id }}/update" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="first_name" class="form-label">Nama Depan</label>
                        <input type="text" id="first_name" name="first_name" class="form-input" value="{{ $user->first_name }}" required>
                        @error('first_name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="form-label">Nama Belakang</label>
                        <input type="text" id="last_name" name="last_name" class="form-input" value="{{ $user->last_name }}" required>
                        @error('last_name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-input" value="{{ $user->email }}" required>
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="role" class="form-label">Role</label>
                        <select id="role" name="role" class="form-select" required>
                            <option value="tourist" {{ $user->role === 'tourist' ? 'selected' : '' }}>Tourist</option>
                            <option value="guide" {{ $user->role === 'guide' ? 'selected' : '' }}>Guide</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Simpan Perubahan
                        </button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
