# Setup DeepSeek API untuk Aplikasi Laravel

## Langkah-langkah Konfigurasi

### 1. Dapatkan API Key DeepSeek
1. Kunjungi [DeepSeek Console](https://platform.deepseek.com/)
2. Daftar atau login ke akun Anda
3. Buat API key baru di dashboard
4. Salin API key yang diberikan

### 2. Konfigurasi Environment Variables
Tambahkan variabel berikut ke file `.env` Anda:

```env
# DeepSeek API Configuration
DEEPSEEK_API_KEY=your_deepseek_api_key_here
DEEPSEEK_BASE_URL=https://api.deepseek.com
DEEPSEEK_MODEL=deepseek-chat
```

### 3. Struktur File yang Telah Dibuat

#### Service Class: `app/Services/DeepSeekService.php`
- Menangani komunikasi dengan API DeepSeek
- Memiliki method untuk generate response dan travel recommendations
- Error handling dan logging

#### Controller Update: `app/Http/Controllers/RekomendasiAIController.php`
- Menggunakan DeepSeek service untuk generate rekomendasi
- Fallback ke dummy data jika API gagal
- Validasi input dan error handling

#### View Update: `resources/views/rekomendasiAI.blade.php`
- Menampilkan hasil dari API DeepSeek
- Error dan success messages
- UI yang responsif

#### Routes: `routes/web.php`
- Route untuk index dan process method
- Named routes untuk kemudahan maintenance

### 4. Testing API

Setelah konfigurasi selesai, Anda dapat test dengan:

1. Jalankan server Laravel:
```bash
php artisan serve
```

2. Kunjungi `/rekomendasiAI`
3. Masukkan pertanyaan seperti:
   - "Rekomendasi wisata alam di Bandung"
   - "Makanan khas Jawa Barat"
   - "Tempat wisata keluarga"

### 5. Troubleshooting

#### Jika API tidak berfungsi:
1. Periksa API key di `.env`
2. Pastikan internet connection stabil
3. Cek log Laravel di `storage/logs/laravel.log`
4. Aplikasi akan fallback ke dummy data jika API gagal

#### Error yang mungkin muncul:
- `DeepSeek API key not configured`: Pastikan `DEEPSEEK_API_KEY` sudah diset di `.env`
- `Failed to get response from DeepSeek API`: Periksa koneksi internet dan API key

### 6. Customization

#### Mengubah Model AI:
Ubah `DEEPSEEK_MODEL` di `.env` sesuai model yang tersedia di DeepSeek.

#### Mengubah Prompt:
Edit method `generateTravelRecommendations()` di `DeepSeekService.php` untuk mengubah prompt yang dikirim ke AI.

#### Mengubah UI:
Edit file `resources/views/rekomendasiAI.blade.php` untuk mengubah tampilan hasil rekomendasi.

### 7. Security Notes

- Jangan commit API key ke repository
- Gunakan environment variables untuk sensitive data
- Monitor penggunaan API untuk menghindari over-usage
- Implement rate limiting jika diperlukan

### 8. Performance Optimization

- Consider caching responses untuk pertanyaan yang sering ditanyakan
- Implement queue untuk handle multiple requests
- Monitor API response time dan optimize jika diperlukan 
