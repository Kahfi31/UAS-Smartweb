<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;

class WisataKeluargaController extends Controller
{
    public function create() {
        return view('wisatakeluarga.create');
    }

    public function store(Request $request) {
        Destinasi::create($request->all());
        return redirect()->route('wisatakeluarga.store')->with('success', 'Destinasi berhasil ditambahkan');
    }

    public function show() {
        $destinations = Destinasi::all();
        return view('wisatakeluarga.show', compact('destinations'));
    }

    public function showdetail() {
        $destinations = Destinasi::all();
        return view('wisatakeluarga.showdetail', compact('destinations'));
    }

    public function delete() {
        $destinations = Destinasi::all(); // Ambil semua data destinasi
        return view('wisatakeluarga.delete', compact('destinations')); // Kirim ke view sebagai $data
    }

    public function destroy($id) {
        Destinasi::destroy($id);
        return redirect()->back()->with('success', 'Destinasi berhasil dihapus');
    }
}
