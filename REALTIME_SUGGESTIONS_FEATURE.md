# Fitur Suggestions Realtime

## Overview
Fitur ini menyediakan suggestions (saran pertanyaan) yang dinamis dan realtime untuk membantu pengguna dalam mengajukan pertanyaan ke AI. Suggestions akan berubah secara otomatis dan dapat diupdate melalui API.

## Fitur Utama

### 1. Suggestions Dinamis
- **Default Suggestions**: 5 suggestions default yang relevan dengan wisata
- **Realtime Updates**: Suggestions dapat diupdate melalui API
- **Responsive Design**: Suggestions yang responsif dan mudah digunakan

### 2. Update Realtime
- **Auto-refresh**: Update suggestions setiap 30 detik
- **Post-submission**: Update setelah form dikirim (2 detik delay)
- **Page load**: Update setelah halaman dimuat (5 detik delay)

### 3. Smart Suggestions
```php
// Default suggestions yang relevan:
1. "Lagi pengen makanan berkuah"
2. "Wisata Budaya di Bandung"
3. "Rekomendasi wisata keluarga"
4. "Tempat wisata alam"
5. "Kuliner street food"
```

## Implementasi

### Controller Methods

#### `getDefaultSuggestions()`
```php
private function getDefaultSuggestions()
{
    return [
        'Lagi pengen makanan berkuah',
        'Wisata Budaya di Bandung',
        'Rekomendasi wisata keluarga',
        'Tempat wisata alam',
        'Kuliner street food'
    ];
}
```

#### `getSuggestions()` API Endpoint
```php
public function getSuggestions()
{
    try {
        $suggestions = $this->getDefaultSuggestions();
        return response()->json([
            'success' => true,
            'suggestions' => $suggestions
        ]);
    } catch (Exception $e) {
        return response()->json([
            'success' => false,
            'suggestions' => $this->getDefaultSuggestions(),
            'message' => 'Using default suggestions'
        ]);
    }
}
```

### Frontend JavaScript

#### Update Suggestions Function
```javascript
function updateSuggestions() {
    fetch('/rekomendasi/suggestions')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const suggestionsContainer = document.querySelector('.rekomendasi-suggestions');
                suggestionsContainer.innerHTML = '';
                
                data.suggestions.forEach(suggestion => {
                    const button = document.createElement('button');
                    button.className = 'rekomendasi-suggestion-btn';
                    button.textContent = suggestion;
                    button.onclick = () => setQuestion(suggestion);
                    suggestionsContainer.appendChild(button);
                });
            }
        })
        .catch(error => {
            console.log('Failed to update suggestions:', error);
        });
}
```

#### Auto-refresh Intervals
```javascript
// Update setiap 30 detik
setInterval(updateSuggestions, 30000);

// Update setelah form submission (2 detik delay)
document.querySelector('form').addEventListener('submit', function() {
    setTimeout(updateSuggestions, 2000);
});

// Update saat page load (5 detik delay)
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(updateSuggestions, 5000);
});
```

## Routes

### API Endpoint
```php
Route::get('/rekomendasi/suggestions', [RekomendasiAIController::class, 'getSuggestions'])
    ->name('rekomendasi.suggestions');
```

## Error Handling

### API Failures
- Fallback ke default suggestions
- Console logging untuk debugging
- Tidak mengganggu user experience

## Performance Considerations

### Frontend Performance
- Debounced updates (30 detik interval)
- Error handling untuk network issues
- Graceful degradation jika API gagal

## Testing

### Manual Testing
1. Test suggestions button functionality
2. Verifikasi suggestions update secara realtime
3. Test dengan network issues
4. Test dengan API failures

### Automated Testing
```php
// Test suggestions API
public function test_suggestions_api()
{
    $response = $this->get('/rekomendasi/suggestions');
    $response->assertStatus(200);
    $response->assertJsonStructure(['success', 'suggestions']);
    $response->assertJsonCount(5, 'suggestions');
}
```

## Monitoring

### Logs
- API response times
- Suggestions update failures
- Error handling logs

### Metrics
- Suggestions update frequency
- User engagement with suggestions
- API endpoint usage

## Future Enhancements

### Potential Improvements
1. **Dynamic Suggestions**: Suggestions berdasarkan trending topics
2. **Category-based Suggestions**: Suggestions berdasarkan kategori wisata
3. **Seasonal Suggestions**: Suggestions yang relevan dengan musim
4. **Personalized Suggestions**: Berdasarkan user preferences
5. **A/B Testing**: Test berbagai suggestions

### Technical Improvements
1. **Caching**: Cache suggestions untuk performa lebih baik
2. **Real-time Updates**: WebSocket untuk update instan
3. **Analytics**: Track suggestion click rates
4. **Smart Filtering**: Filter suggestions berdasarkan relevansi

## Deployment Notes

### Environment Variables
```env
# DeepSeek API Configuration
DEEPSEEK_API_KEY=your_api_key_here
DEEPSEEK_API_URL=https://api.deepseek.com/v1/chat/completions
```

### Database Migration
```bash
php artisan migrate
```

### Cache Configuration
```php
// config/cache.php
'suggestions' => [
    'driver' => 'redis',
    'ttl' => 300, // 5 minutes
],
```

## Troubleshooting

### Common Issues

#### Suggestions Tidak Update
1. Check database connection
2. Verify API endpoint accessible
3. Check browser console for errors
4. Verify JavaScript execution

#### Performance Issues
1. Optimize database queries
2. Implement caching
3. Reduce update frequency
4. Monitor server resources

#### Suggestions Kosong
1. Check if search history exists
2. Verify default suggestions configured
3. Check error logs
4. Test with sample data

## Support

Untuk bantuan teknis atau pertanyaan tentang fitur ini, silakan hubungi tim development atau buat issue di repository. 
