<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitedPlace;
use Illuminate\Support\Facades\Storage;

class UlasanController extends Controller
{
    public function index()
    {
        $visitedPlaces = VisitedPlace::orderBy('created_at', 'desc')->get();
        return view('ulasan', compact('visitedPlaces'));
    }

    public function create($id)
    {
        $place = VisitedPlace::findOrFail($id);
        return view('ulasan.create', compact('place'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'ulasan' => 'required|string|min:10',
            'gambar_ulasan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $place = VisitedPlace::findOrFail($id);

        $data = [
            'rating' => $request->rating,
            'ulasan' => $request->ulasan,
            'user_id' => auth()->id(),
        ];

        // Handle image upload
        if ($request->hasFile('gambar_ulasan')) {
            $image = $request->file('gambar_ulasan');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/ulasan', $imageName);
            $data['gambar_ulasan'] = $imageName;
        }

        // Update place with rating and review
        $place->update($data);

        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil ditambahkan!');
    }
}
