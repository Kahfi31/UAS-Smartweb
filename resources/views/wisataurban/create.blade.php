<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisitEase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>

<body>
<div style="padding: 2rem;">
    <h2>Tambah Destinasi</h2>
    <form action="{{ route('wisataurban.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama" required><br>

        <label>Rating:</label>
        <input type="number" step="0.1" name="rating" required><br>

        <label>Deskripsi:</label>
        <textarea name="deskripsi" required></textarea><br>

        <label>Lokasi:</label>
        <input type="text" id="autocomplete" name="lokasi" required>
        <input type="hidden" name="latitude" id="lat">
        <input type="hidden" name="longitude" id="lng">

        <button type="submit">Simpan</button>
    </form>
</div>

</body>
</html>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
<script>
    const input = document.getElementById("autocomplete");
    const autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.addListener("place_changed", function () {
        const place = autocomplete.getPlace();
        document.getElementById('lat').value = place.geometry.location.lat();
        document.getElementById('lng').value = place.geometry.location.lng();
    });
</script>
