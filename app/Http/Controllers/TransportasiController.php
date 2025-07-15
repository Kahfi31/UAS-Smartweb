<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\TransportSearch;
use App\Models\VisitedPlace;

class TransportasiController extends Controller
{
    public function getRute(Request $request)
    {
        try {
            $request->validate([
                'asal' => 'required|string',
                'tujuan' => 'required|string',
            ]);

            Log::info('Transport search request', [
                'asal' => $request->asal,
                'tujuan' => $request->tujuan,
                'user_id' => auth()->id()
            ]);

            // Ambil koordinat asal & tujuan
            $asalCoords = $this->getCoordinates($request->asal);
            $tujuanCoords = $this->getCoordinates($request->tujuan);

            if (!$asalCoords) {
                Log::warning('Failed to get coordinates for asal', ['asal' => $request->asal]);
                return response()->json(['message' => 'Gagal menemukan koordinat untuk lokasi asal: ' . $request->asal], 422);
            }

            if (!$tujuanCoords) {
                Log::warning('Failed to get coordinates for tujuan', ['tujuan' => $request->tujuan]);
                return response()->json(['message' => 'Gagal menemukan koordinat untuk lokasi tujuan: ' . $request->tujuan], 422);
            }

            Log::info('Coordinates found', [
                'asal_coords' => $asalCoords,
                'tujuan_coords' => $tujuanCoords
            ]);

            // Panggil OSRM dengan opsi alternatif = true dan overview=full untuk mendapatkan koordinat rute
            $osrmUrl = "https://router.project-osrm.org/route/v1/driving/{$asalCoords['lon']},{$asalCoords['lat']};{$tujuanCoords['lon']},{$tujuanCoords['lat']}?overview=full&alternatives=true&geometries=polyline";

            Log::info('Calling OSRM API', ['url' => $osrmUrl]);

            $response = Http::withHeaders([
                'User-Agent' => 'RuteWisataApp/0.1-dev'
            ])->timeout(30)->get($osrmUrl);

            if (!$response->ok()) {
                Log::error('OSRM API error', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return response()->json(['message' => 'Gagal mengambil rute dari layanan routing. Silakan coba lagi.'], 500);
            }

            $data = $response->json();

            if (!isset($data['routes']) || count($data['routes']) === 0) {
                Log::warning('No routes found from OSRM', ['data' => $data]);
                return response()->json(['message' => 'Tidak ada rute ditemukan antara lokasi tersebut.'], 404);
            }

            // Ambil semua rute dengan koordinat
            $ruteList = collect($data['routes'])->map(function ($route, $index) {
                return [
                    'rute_ke' => $index + 1,
                    'durasi_menit' => round($route['duration'] / 60),
                    'jarak_km' => round($route['distance'] / 1000, 2),
                    'geometry' => $route['geometry'],
                    'legs' => $route['legs'] ?? [],
                ];
            });

            Log::info('Routes processed successfully', [
                'route_count' => $ruteList->count(),
                'routes' => $ruteList->toArray()
            ]);

            // Simpan ke database
            $this->saveSearchHistory($request->asal, $request->tujuan, $ruteList->toArray(), $request);

            // Simpan tempat tujuan sebagai tempat yang sudah dikunjungi
            $this->saveVisitedPlace($request->tujuan, $tujuanCoords, $request);

            return response()->json([
                'message' => 'Beberapa rute berhasil ditemukan.',
                'rute' => $ruteList,
            ]);

        } catch (\Exception $e) {
            Log::error('Transport search error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return response()->json([
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    private function saveSearchHistory($asal, $tujuan, $ruteData, $request)
    {
        try {
            TransportSearch::create([
                'asal' => $asal,
                'tujuan' => $tujuan,
                'rute_data' => $ruteData,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
            Log::info('Search history saved successfully');
        } catch (\Exception $e) {
            Log::error('Failed to save transport search history: ' . $e->getMessage());
        }
    }

    private function saveVisitedPlace($tujuan, $tujuanCoords, $request)
    {
        try {
            // Cek apakah tempat sudah ada di database
            $existingPlace = VisitedPlace::where('nama_tempat', $tujuan)->first();

            if (!$existingPlace) {
                VisitedPlace::create([
                    'nama_tempat' => $tujuan,
                    'lokasi' => $tujuanCoords['display_name'] ?? $tujuan,
                    'deskripsi' => 'Tempat wisata yang sudah dikunjungi',
                    'user_id' => auth()->id(),
                ]);
                Log::info('Visited place saved successfully', ['tujuan' => $tujuan]);
            }
        } catch (\Exception $e) {
            Log::error('Failed to save visited place: ' . $e->getMessage());
        }
    }

    private function getCoordinates($query)
    {
        try {
            $url = "https://nominatim.openstreetmap.org/search?format=json&q=" . urlencode($query)
                 . "&countrycodes=ID&limit=1&addressdetails=1";

            Log::info('Calling Nominatim API', ['url' => $url]);

            $response = Http::withHeaders([
                'User-Agent' => 'RuteWisataApp/0.1-dev'
            ])->timeout(10)->get($url);

            if ($response->ok() && count($response->json()) > 0) {
                $data = $response->json()[0];
                Log::info('Coordinates found', [
                    'query' => $query,
                    'coordinates' => ['lat' => $data['lat'], 'lon' => $data['lon']]
                ]);

                return [
                    'lat' => $data['lat'],
                    'lon' => $data['lon'],
                    'display_name' => $data['display_name'] ?? null,
                ];
            }

            Log::warning('No coordinates found', ['query' => $query, 'response' => $response->json()]);
            return null;
        } catch (\Exception $e) {
            Log::error('Error getting coordinates', [
                'query' => $query,
                'error' => $e->getMessage()
            ]);
            return null;
        }
    }
}
