<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeminiService;
use App\Models\SearchHistory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class RekomendasiAIController extends Controller
{
    protected $geminiService;

    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    public function index()
    {
        $suggestions = $this->getSuggestions();
        return view('rekomendasiAI', compact('suggestions'));
    }

    public function rekomendasi(Request $request)
{
    $request->validate([
        'pertanyaan' => 'required|string|max:255',
    ]);

    $pertanyaan = $request->input('pertanyaan');
    $category = $this->detectCategory($pertanyaan);
    $isAi = true;

    try {
        $result = $this->geminiService->generateTravelRecommendations($pertanyaan);

        $rekomendasiText = $result['parsed'] ?? [];
        $aiResponse = $result['raw'] ?? '';

        if (empty($rekomendasiText)) {
            throw new \Exception("Rekomendasi tidak tersedia dari AI");
        }

        // ✨ Gabungkan untuk NER
        $joinedDesc = implode(" ", $rekomendasiText);
        $places = $this->extractPlacesUsingNER($joinedDesc);

        Log::info('NER hasil tempat:', $places);

        $rekomendasi = [];
        foreach ($rekomendasiText as $line) {
            if (preg_match('/^\d+\.\s*(.+?)\s*-\s*(.+)$/', $line, $matches)) {
                $title = trim($matches[1]);
                $desc = trim($matches[2]);
            } elseif (preg_match('/^\*\*(.+?)\*\*:\s*(.+)$/', $line, $matches)) {
                // fallback untuk format Markdown
                $title = trim($matches[1]);
                $desc = trim($matches[2]);
            } else {
                Log::warning('Gagal parsing baris rekomendasi', ['line' => $line]);
                continue;
            }

            $matchedPlace = collect($places)
                ->first(fn($place) => str_contains(strtolower($title), strtolower($place))) ?? $title;

            $image = $this->getUnsplashImage($matchedPlace);

            $rekomendasi[] = [
                'title' => $title,
                'desc' => $desc,
                'image' => $image,
            ];
        }

        $this->saveSearchHistory($pertanyaan, $aiResponse, $rekomendasiText, $category, $isAi);
    } catch (\Exception $e) {
        Log::error('AI Recommendation Failed', ['error' => $e->getMessage()]);

        $fallback = $this->generateDummyRekomendasi($category);
        $aiResponse = implode("\n", $fallback);
        $isAi = false;

        $rekomendasi = [];
        foreach ($fallback as $line) {
            if (preg_match('/^\d+\.\s*(.+?)\s*-\s*(.+)$/', $line, $matches)) {
                $title = trim($matches[1]);
                $desc = trim($matches[2]);

                $rekomendasi[] = [
                    'title' => $title,
                    'desc' => $desc,
                    'image' => $this->getUnsplashImage($title),
                ];
            }
        }

        $this->saveSearchHistory($pertanyaan, $aiResponse, $fallback, $category, $isAi);
    }

    $suggestions = $this->getSuggestions();

    return view('rekomendasiAI', [
        'pertanyaan' => $pertanyaan,
        'rekomendasi' => $rekomendasi,
        'category' => $category,
        'isAi' => $isAi,
        'suggestions' => $suggestions
    ]);
}

private function extractPlacesUsingNER($text)
{
    $response = Http::withToken(env('HUGGINGFACE_API_KEY'))
        ->post('https://api-inference.huggingface.co/models/dbmdz/bert-large-cased-finetuned-conll03-english', [
            'inputs' => $text,
        ]);

    $data = $response->json();

    // Cek apakah response valid dan array-nya berbentuk sesuai harapan
    if (!is_array($data) || !isset($data[0]) || !is_array($data[0])) {
        Log::error('NER format tidak sesuai', ['data' => $data]);
        return []; // fallback
    }

    $places = [];
    foreach ($data[0] as $entity) {
        if (isset($entity['entity_group']) && in_array($entity['entity_group'], ['LOC', 'ORG'])) {
            $places[] = $entity['word'];
        }
    }

    return array_unique($places);
}

    public function getSuggestions()
    {
        $popular = SearchHistory::popular(3)->pluck('user_query')->toArray();
        $recent = SearchHistory::recent(2)->pluck('user_query')->toArray();
        return array_values(array_unique(array_merge($popular, $recent)));
    }

    protected function detectCategory($text)
    {
        $lower = strtolower($text);

        return match (true) {
            str_contains($lower, 'makanan'), str_contains($lower, 'kuliner') => 'kuliner',
            str_contains($lower, 'budaya'), str_contains($lower, 'tradisi') => 'budaya',
            str_contains($lower, 'alam'), str_contains($lower, 'pegunungan') => 'alam',
            default => 'umum'
        };
    }

    protected function generateDummyRekomendasi($category)
    {
        return match ($category) {
            'kuliner' => [
                "1. Sate Kelinci Lembang - Sate khas Bandung dengan bumbu kacang yang lezat",
                "2. Batagor Kingsley - Batagor legendaris dengan cita rasa khas",
                "3. Mie Kocok Bandung - Mie dengan kuah sapi gurih dan kikil",
                "4. Es Cendol Bandung - Minuman tradisional menyegarkan dengan gula merah",
                "5. Kue Cubit - Camilan manis yang digemari anak-anak",
            ],
            'budaya' => [
                "1. Saung Angklung Udjo - Pertunjukan angklung dan budaya Sunda",
                "2. Museum Geologi - Museum sejarah bumi dan batuan",
                "3. Kampung Adat Cikondang - Desa tradisional yang mempertahankan adat Sunda",
                "4. Gedung Sate - Ikon arsitektur kolonial Belanda",
                "5. Museum Sri Baduga - Koleksi budaya dan sejarah Jawa Barat",
            ],
            'alam' => [
                "1. Taman Hutan Raya Ir. H. Juanda - Wisata alam dan edukasi",
                "2. Tangkuban Perahu - Kawah gunung berapi yang aktif",
                "3. Kawah Putih - Danau belerang dengan warna unik",
                "4. Gunung Papandayan - Jalur pendakian populer dengan pemandangan indah",
                "5. Situ Patenggang - Danau alami yang romantis dan tenang",
            ],
            default => [
                "1. Trans Studio Bandung - Wahana indoor terbesar di Asia Tenggara",
                "2. Braga Street - Jalan bersejarah dengan banyak kafe dan galeri seni",
                "3. Taman Hutan Raya - Tempat wisata keluarga dengan udara segar",
                "4. Alun-alun Bandung - Pusat keramaian dengan ruang hijau publik",
                "5. Jalan Asia Afrika - Landmark penting sejarah Konferensi Asia-Afrika",
            ],
        };
    }

    protected function saveSearchHistory($pertanyaan, $jawaban, $rekomendasi, $category, $isAi)
    {
        try {
            SearchHistory::create([
                'user_query' => $pertanyaan,
                'ai_response' => $jawaban,
                'recommendations' => $rekomendasi,
                'category' => $category,
                'is_success' => $isAi,
                'error_message' => null,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to save history', ['error' => $e->getMessage()]);
        }
    }

    // 🔥 FUNGSI BARU: ambil gambar dari Unsplash
    private function getUnsplashImage($query)
{
    try {
        $client = new Client();

        $response = $client->get("https://api.unsplash.com/search/photos", [
            'headers' => [
                'Authorization' => 'Client-ID ' . env('UNSPLASH_ACCESS_KEY'),
            ],
            'query' => [
                'query' => $query,
                'per_page' => 1,
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        return $data['results'][0]['urls']['small'] ?? null;
    } catch (\Exception $e) {
        Log::error('Gagal ambil gambar Unsplash', ['error' => $e->getMessage()]);
        return null;
    }
}
}
