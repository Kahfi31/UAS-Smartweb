<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Guide Data - VisitEase</title>
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

        /* Admin Dashboard Styles */
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .admin-header {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .admin-header h1 {
            color: #022059;
            margin: 0 0 0.5rem 0;
            font-size: 2rem;
            font-weight: 800;
        }

        .admin-header p {
            color: #6b7280;
            margin: 0;
        }

        .data-section {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .section-header {
            background-color: #f8fafc;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .section-header h2 {
            color: #022059;
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            padding: 1rem 1.5rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .data-table th {
            background-color: #f8fafc;
            font-weight: 600;
            color: #374151;
        }

        .data-table tr:hover {
            background-color: #f9fafb;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-guide {
            background-color: #dcfce7;
            color: #166534;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.875rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-edit {
            background-color: #fbbf24;
            color: #92400e;
        }

        .btn-edit:hover {
            background-color: #f59e0b;
        }

        .btn-delete {
            background-color: #ef4444;
            color: white;
        }

        .btn-delete:hover {
            background-color: #dc2626;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background-color: #ffffff;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .stat-card h3 {
            color: #6b7280;
            font-size: 0.875rem;
            font-weight: 500;
            margin: 0 0 0.5rem 0;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .stat-card .stat-value {
            color: #022059;
            font-size: 2rem;
            font-weight: 800;
            margin: 0;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #6b7280;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .add-guide-btn {
            background-color: #10b981;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .add-guide-btn:hover {
            background-color: #059669;
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
            <a href="/admin/guide" style="color: #022059; font-weight: 600;">Data Guide</a>
        </div>
        @auth
            <a href="/logout" class="login-button">Logout</a>
        @else
            <a href="/login" class="login-button">Login</a>
        @endauth
    </nav>

    <main>
        @if(session('error'))
            <div style="background-color: #fef2f2; color: #dc2626; padding: 1rem; margin: 1rem 2rem; border-radius: 6px; border: 1px solid #fecaca;">
                <strong>Error:</strong> {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div style="background-color: #f0fdf4; color: #166534; padding: 1rem; margin: 1rem 2rem; border-radius: 6px; border: 1px solid #bbf7d0;">
                <strong>Success:</strong> {{ session('success') }}
            </div>
        @endif

        <div class="admin-container">
            <!-- Admin Header -->
            <div class="admin-header">
                <h1>Data Guide</h1>
                <p>Kelola data guide dalam sistem VisitEase</p>
            </div>

            <!-- Statistics -->
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Total Guide</h3>
                    <p class="stat-value">{{ $guideCount ?? 0 }}</p>
                </div>
                <div class="stat-card">
                    <h3>Guide Aktif</h3>
                    <p class="stat-value">{{ $guideCount ?? 0 }}</p>
                </div>
            </div>

            <!-- Guide Data Section -->
            <div class="data-section">
                <div class="section-header">
                    <h2>Data Guide</h2>
                </div>
                @if(isset($guides) && count($guides) > 0)
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Tanggal Registrasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($guides as $guide)
                                <tr>
                                    <td>{{ $guide->id }}</td>
                                    <td>{{ $guide->first_name }} {{ $guide->last_name }}</td>
                                    <td>{{ $guide->email }}</td>
                                    <td>
                                        <span class="status-badge status-guide">{{ $guide->role }}</span>
                                    </td>
                                    <td>{{ $guide->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <span class="status-badge status-guide">Aktif</span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="/admin/user/{{ $guide->id }}/edit" class="btn btn-edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="/admin/user/{{ $guide->id }}/delete" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus guide ini?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <i class="fas fa-user-tie"></i>
                        <h3>Tidak ada data guide</h3>
                        <p>Belum ada guide yang terdaftar dalam sistem.</p>
                    </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>
