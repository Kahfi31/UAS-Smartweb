<?php

/**
 * Script Helper untuk Setup DeepSeek API
 * Jalankan dengan: php setup_deepseek.php
 */

echo "=== Setup DeepSeek API Helper ===\n\n";

// 1. Cek apakah file .env ada
if (!file_exists('.env')) {
    echo "❌ File .env tidak ditemukan!\n";
    echo "Buat file .env dari .env.example terlebih dahulu.\n";
    exit(1);
}

// 2. Cek konfigurasi DeepSeek di .env
$envContent = file_get_contents('.env');
$deepseekConfig = [];

if (strpos($envContent, 'DEEPSEEK_API_KEY') === false) {
    echo "⚠️  Konfigurasi DeepSeek belum ada di .env\n";
    echo "Menambahkan konfigurasi DeepSeek...\n";

    $envContent .= "\n# DeepSeek API Configuration\n";
    $envContent .= "DEEPSEEK_API_KEY=your_deepseek_api_key_here\n";
    $envContent .= "DEEPSEEK_BASE_URL=https://api.deepseek.com\n";
    $envContent .= "DEEPSEEK_MODEL=deepseek-chat\n";

    file_put_contents('.env', $envContent);
    echo "✅ Konfigurasi DeepSeek berhasil ditambahkan ke .env\n\n";
} else {
    echo "✅ Konfigurasi DeepSeek sudah ada di .env\n\n";
}

// 3. Cek apakah service class ada
if (!file_exists('app/Services/DeepSeekService.php')) {
    echo "❌ DeepSeekService.php tidak ditemukan!\n";
    echo "Pastikan file app/Services/DeepSeekService.php sudah dibuat.\n";
    exit(1);
} else {
    echo "✅ DeepSeekService.php ditemukan\n";
}

// 4. Cek apakah controller sudah diupdate
if (!file_exists('app/Http/Controllers/RekomendasiAIController.php')) {
    echo "❌ RekomendasiAIController.php tidak ditemukan!\n";
    exit(1);
} else {
    echo "✅ RekomendasiAIController.php ditemukan\n";
}

// 5. Cek routes
$routesContent = file_get_contents('routes/web.php');
if (strpos($routesContent, 'rekomendasi.process') === false) {
    echo "❌ Route rekomendasi.process tidak ditemukan!\n";
    echo "Pastikan routes sudah diupdate.\n";
    exit(1);
} else {
    echo "✅ Routes sudah dikonfigurasi dengan benar\n";
}

// 6. Test koneksi database (opsional)
echo "\n=== Testing Database Connection ===\n";
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=laravel', 'root', '');
    echo "✅ Database connection berhasil\n";
} catch (PDOException $e) {
    echo "⚠️  Database connection gagal: " . $e->getMessage() . "\n";
    echo "Ini tidak masalah jika Anda belum setup database.\n";
}

// 7. Instruksi selanjutnya
echo "\n=== Langkah Selanjutnya ===\n";
echo "1. Dapatkan API Key dari https://platform.deepseek.com/\n";
echo "2. Edit file .env dan ganti 'your_deepseek_api_key_here' dengan API key Anda\n";
echo "3. Jalankan: php artisan serve\n";
echo "4. Kunjungi: http://localhost:8000/rekomendasiAI\n";
echo "5. Test dengan pertanyaan seperti 'Rekomendasi wisata di Bandung'\n\n";

echo "=== Struktur File yang Dibuat ===\n";
echo "✅ app/Services/DeepSeekService.php - Service untuk API calls\n";
echo "✅ app/Http/Controllers/RekomendasiAIController.php - Controller yang diupdate\n";
echo "✅ resources/views/rekomendasiAI.blade.php - View yang diupdate\n";
echo "✅ routes/web.php - Routes yang diupdate\n";
echo "✅ config/services.php - Konfigurasi services\n";
echo "✅ DEEPSEEK_SETUP.md - Dokumentasi lengkap\n\n";

echo "🎉 Setup selesai! Silakan ikuti langkah selanjutnya di atas.\n";
