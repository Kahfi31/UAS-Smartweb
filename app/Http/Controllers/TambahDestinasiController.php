<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class TambahDestinasiController extends Controller
{
    /**
     * Tampilkan form tambah destinasi
     */
    public function index()
    {
        return view('tambahdestinasi');
    }

    /**
     * Simpan data destinasi baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|in:wisata_alam,wisata_budaya,wisata_kuliner,wisata_urban,wisata_keluarga',
            'lokasi' => 'required|string|max:500',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'jam_operasional' => 'required|string|max:255',
        ], [
            'nama.required' => 'Nama wisata wajib diisi',
            'nama.max' => 'Nama wisata maksimal 255 karakter',
            'kategori.required' => 'Kategori wisata wajib dipilih',
            'kategori.in' => 'Kategori wisata tidak valid',
            'lokasi.required' => 'Lokasi wisata wajib diisi',
            'lokasi.max' => 'Lokasi wisata maksimal 500 karakter',
            'latitude.numeric' => 'Latitude harus berupa angka',
            'latitude.between' => 'Latitude harus antara -90 sampai 90',
            'longitude.numeric' => 'Longitude harus berupa angka',
            'longitude.between' => 'Longitude harus antara -180 sampai 180',
            'jam_operasional.required' => 'Jam operasional wajib diisi',
            'jam_operasional.max' => 'Jam operasional maksimal 255 karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Upload gambar jika ada
            $gambarPath = null;
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . $gambar->getClientOriginalName();
                $gambarPath = $gambar->storeAs('public/destinasi', $gambarName);
                $gambarPath = str_replace('public/', '', $gambarPath);
            }

            $kategoriDisplay = [
                'wisata_alam' => 'Wisata Alam',
                'wisata_budaya' => 'Wisata Budaya',
                'wisata_kuliner' => 'Wisata Kuliner',
                'wisata_urban' => 'Wisata Urban',
                'wisata_keluarga' => 'Wisata Keluarga'
            ];

            Destinasi::create([
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'kategori_display' => $kategoriDisplay[$request->kategori] ?? $request->kategori,
                'lokasi' => $request->lokasi,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'jam_operasional' => $request->jam_operasional,
                'created_by' => auth()->id() ?? 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return redirect()->back()->with('success', 'Destinasi berhasil ditambahkan!');
        } catch (\Exception $e) {
            if ($gambarPath && Storage::exists('public/' . $gambarPath)) {
                Storage::delete('public/' . $gambarPath);
            }

            return redirect()->back()
                ->withErrors(['error' => 'Gagal menyimpan data: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function searchLocation(Request $request)
{
    $query = $request->get('query');

    if (empty($query) || strlen($query) < 3) {
        return response()->json([
            'success' => false,
            'message' => 'Query minimal 3 karakter.'
        ]);
    }

    try {
        $response = Http::get('https://nominatim.openstreetmap.org/search', [
            'q' => $query,
            'format' => 'json',
            'addressdetails' => 1,
            'limit' => 10,
            'countrycodes' => 'ID'
        ]);

        if ($response->failed()) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data lokasi dari Nominatim.'
            ]);
        }

        $data = collect($response->json())
            ->filter(function ($item) {
                $address = $item['address'] ?? [];
                return isset($address['city']) || isset($address['town']) || isset($address['village']);
            })
            ->sortByDesc('importance')
            ->map(function ($item) {
                // Lebih rapi: tampilkan nama + kota/kabupaten + provinsi
                $address = $item['address'];
                $city = $address['city'] ?? $address['town'] ?? $address['village'] ?? '';
                $state = $address['state'] ?? '';
                $formatted = $city && $state ? "{$city}, {$state}" : $item['display_name'];

                return [
                    'display_name' => $formatted,
                    'full_address' => $item['display_name'],
                    'lat' => $item['lat'],
                    'lon' => $item['lon']
                ];
            })
            ->values();

        return response()->json([
            'success' => true,
            'results' => $data
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
        ]);
    }
}

    /**
     * Menampilkan semua destinasi
     */
    public function list()
    {
        $destinasi = Destinasi::orderBy('created_at', 'desc')->paginate(10);
        return view('destinasi.index', compact('destinasi'));
    }

    /**
     * Menampilkan detail destinasi
     */
    public function show($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        return view('destinasi.show', compact('destinasi'));
    }

    /**
     * Menampilkan form edit destinasi
     */
    public function edit($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        return view('destinasi.edit', compact('destinasi'));
    }

    /**
     * Update destinasi
     */
    public function update(Request $request, $id)
    {
        $destinasi = Destinasi::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|in:wisata_alam,wisata_budaya,wisata_kuliner,wisata_urban,wisata_keluarga',
            'lokasi' => 'required|string|max:500',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'jam_operasional' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            if ($request->hasFile('gambar')) {
                if ($destinasi->gambar && Storage::exists('public/' . $destinasi->gambar)) {
                    Storage::delete('public/' . $destinasi->gambar);
                }

                $gambar = $request->file('gambar');
                $gambarName = time() . '_' . $gambar->getClientOriginalName();
                $gambarPath = $gambar->storeAs('public/destinasi', $gambarName);
                $gambarPath = str_replace('public/', '', $gambarPath);
            } else {
                $gambarPath = $destinasi->gambar;
            }

            $kategoriDisplay = [
                'wisata_alam' => 'Wisata Alam',
                'wisata_budaya' => 'Wisata Budaya',
                'wisata_kuliner' => 'Wisata Kuliner',
                'wisata_urban' => 'Wisata Urban',
                'wisata_keluarga' => 'Wisata Keluarga'
            ];

            $destinasi->update([
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'kategori_display' => $kategoriDisplay[$request->kategori] ?? $request->kategori,
                'lokasi' => $request->lokasi,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'jam_operasional' => $request->jam_operasional,
                'updated_at' => now()
            ]);

            return redirect()->route('destinasi.show', $destinasi->id)
                ->with('success', 'Destinasi berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Gagal memperbarui data: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Hapus destinasi
     */
    public function destroy($id)
    {
        $destinasi = Destinasi::findOrFail($id);

        try {
            if ($destinasi->gambar && Storage::exists('public/' . $destinasi->gambar)) {
                Storage::delete('public/' . $destinasi->gambar);
            }

            $destinasi->delete();

            return redirect()->route('destinasi.index')
                ->with('success', 'Destinasi berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Gagal menghapus data: ' . $e->getMessage()]);
        }
    }
}
