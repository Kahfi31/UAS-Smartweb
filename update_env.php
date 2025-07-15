<?php

/**
 * Script untuk mengupdate file .env dengan API key DeepSeek
 */

$envFile = '.env';
$apiKey = '1afa32c20082c9a9c68ffa1ec905e351e2514e1621892b2dc8effc981c8e8f0d';

echo "=== Updating .env file with DeepSeek API Key ===\n";

// Baca file .env
if (!file_exists($envFile)) {
    echo "❌ File .env tidak ditemukan!\n";
    exit(1);
}

$content = file_get_contents($envFile);

// Hapus konfigurasi DeepSeek yang lama jika ada
$lines = explode("\n", $content);
$newLines = [];

foreach ($lines as $line) {
    if (!preg_match('/^DEEPSEEK_/', $line) && !preg_match('/^# DeepSeek/', $line)) {
        $newLines[] = $line;
    }
}

// Tambahkan konfigurasi DeepSeek yang baru
$newLines[] = "";
$newLines[] = "# DeepSeek API Configuration";
$newLines[] = "DEEPSEEK_API_KEY=" . $apiKey;
$newLines[] = "DEEPSEEK_BASE_URL=https://api.deepseek.com";
$newLines[] = "DEEPSEEK_MODEL=deepseek-chat";

// Tulis kembali ke file
$newContent = implode("\n", $newLines);
file_put_contents($envFile, $newContent);

echo "✅ File .env berhasil diupdate dengan API key DeepSeek!\n";
echo "API Key: " . substr($apiKey, 0, 10) . "...\n";
echo "Base URL: https://api.deepseek.com\n";
echo "Model: deepseek-chat\n\n";

echo "Sekarang Anda bisa test dengan:\n";
echo "php artisan deepseek:test 'Rekomendasi wisata di Bandung'\n";
