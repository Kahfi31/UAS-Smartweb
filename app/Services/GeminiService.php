<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Exception;

class GeminiService
{
    private $geminiApiKey;
    private $apiUrl;

    public function __construct()
    {
        $this->geminiApiKey = env('GEMINI_API_KEY');
        $this->apiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $this->geminiApiKey;
    }

    // Simpan gambar dan konversi ke base64
    public function saveAndEncodeImage($image)
    {
        $imagePath = $image->store('images');
        $fullPath = storage_path("app/{$imagePath}");

        if (!file_exists($fullPath)) {
            throw new Exception("Gagal menyimpan gambar.");
        }

        $imageData = file_get_contents($fullPath);
        return base64_encode($imageData);
    }

    // Kirim ke Gemini (text + optional image)
    public function sendToGemini($message, $image = null)
    {
        $client = new Client();

        $payload = ["contents" => [["parts" => []]]];

        if (!empty($message)) {
            $payload["contents"][0]["parts"][] = ["text" => $message];
        }

        if ($image) {
            $encodedImage = base64_encode(file_get_contents($image->getPathname()));
            $payload["contents"][0]["parts"][] = [
                "inline_data" => [
                    "mime_type" => "image/jpeg",
                    "data" => $encodedImage
                ]
            ];
        }

        try {
            $response = $client->post($this->apiUrl, [
                'json' => $payload,
                'headers' => ['Content-Type' => 'application/json']
            ]);

            $responseBody = json_decode($response->getBody(), true);
            return $responseBody['candidates'][0]['content']['parts'][0]['text'] ?? 'Tidak ada respons dari Gemini';
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Tambahkan method ini agar kompatibel dengan controller
    public function generateTravelRecommendations($userInput)
    {
        $prompt = "Berdasarkan input pengguna berikut, berikan rekomendasi wisata yang relevan di Indonesia. Format jawaban dalam bentuk list dengan nama destinasi dan deskripsi singkat:\n\nInput pengguna: {$userInput}\n\nBerikan 3-5 rekomendasi wisata yang sesuai.";
        $response = $this->sendToGemini($prompt);

        return $this->parseRecommendations($response);
    }

    // Ekstrak list rekomendasi dari hasil AI
    private function parseRecommendations($aiResponse)
    {
        $lines = explode("\n", $aiResponse);
        $recommendations = [];

        foreach ($lines as $line) {
            $line = trim($line);
            if (!empty($line) && (preg_match('/^\d+\./', $line) || preg_match('/^[-*]/', $line))) {
                $recommendations[] = $line;
            }
        }

        return [
            'parsed' => $recommendations ?: [$aiResponse],
            'raw' => $aiResponse
        ];
    }
}
