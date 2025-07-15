<?php

/**
 * Test Script untuk DeepSeek Service
 * Jalankan dengan: php test_deepseek.php
 */

require_once 'vendor/autoload.php';

// Load Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Services\DeepSeekService;

echo "=== Test DeepSeek Service ===\n\n";

try {
    $deepSeekService = new DeepSeekService();

    echo "✅ DeepSeekService berhasil diinstansiasi\n";

    // Test dengan dummy data (tanpa API key)
    echo "\n=== Testing Dummy Response ===\n";

    $testQuestion = "Rekomendasi wisata alam di Bandung";
    echo "Pertanyaan: {$testQuestion}\n";

    // Test generateTravelRecommendations
    try {
        $recommendations = $deepSeekService->generateTravelRecommendations($testQuestion);
        echo "✅ Method generateTravelRecommendations berhasil\n";
        echo "Hasil: " . implode(", ", $recommendations) . "\n";
    } catch (Exception $e) {
        echo "❌ Error: " . $e->getMessage() . "\n";
        echo "Ini normal jika API key belum diset\n";
    }

    // Test generateResponse
    echo "\n=== Testing generateResponse ===\n";
    try {
        $response = $deepSeekService->generateResponse("Test prompt");
        echo "✅ Method generateResponse berhasil\n";
        echo "Response: " . substr($response, 0, 100) . "...\n";
    } catch (Exception $e) {
        echo "❌ Error: " . $e->getMessage() . "\n";
        echo "Ini normal jika API key belum diset\n";
    }

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}

echo "\n=== Test Controller ===\n";

try {
    $controller = new \App\Http\Controllers\RekomendasiAIController($deepSeekService);
    echo "✅ RekomendasiAIController berhasil diinstansiasi\n";

    // Test dummy recommendation
    $reflection = new ReflectionClass($controller);
    $method = $reflection->getMethod('generateDummyRekomendasi');
    $method->setAccessible(true);

    $dummyResult = $method->invoke($controller, "makanan");
    echo "✅ Dummy recommendation berhasil: " . implode(", ", $dummyResult) . "\n";

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}

echo "\n=== Status Konfigurasi ===\n";
echo "DEEPSEEK_API_KEY: " . (config('services.deepseek.api_key') ? '✅ Set' : '❌ Not Set') . "\n";
echo "DEEPSEEK_BASE_URL: " . config('services.deepseek.base_url') . "\n";
echo "DEEPSEEK_MODEL: " . config('services.deepseek.model') . "\n";

echo "\n🎉 Test selesai! Jika semua ✅, berarti setup sudah benar.\n";
echo "Sekarang Anda bisa:\n";
echo "1. Dapatkan API key dari DeepSeek\n";
echo "2. Update .env dengan API key\n";
echo "3. Test aplikasi dengan: php artisan serve\n";
