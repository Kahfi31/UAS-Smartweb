<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Destinasi;

class WisataUrbanController extends Controller
{
    public function create() {
        return view('wisataurban.create');
    }

    public function store(Request $request) {
        Destinasi::create($request->all());
        return redirect()->route('wisataurban.store')->with('success', 'Destinasi berhasil ditambahkan');
    }

    public function show() {
        $destinations = Destinasi::all();
        return view('wisataurban.show', compact('destinations'));
    }

     public function showdetailalunkotabatu() {
        $destinations = Destinasi::all();
        return view('wisataurban.showdetailalunkotabatu', compact('destinations'));
    }

    public function showdetailbraga() {
        $destinations = Destinasi::all();
        return view('wisataurban.showdetailbraga', compact('destinations'));
    }

    public function showdetailchinatown() {
        $destinations = Destinasi::all();
        return view('wisataurban.showdetailchinatown', compact('destinations'));
    }

    public function showdetailkotatua() {
        $destinations = Destinasi::all();
        return view('wisataurban.showdetailkotatua', compact('destinations'));
    }

    public function showdetailmalioboro() {
        $destinations = Destinasi::all();
        return view('wisataurban.showdetailmalioboro', compact('destinations'));
    }

    public function showdetailSCBD() {
        $destinations = Destinasi::all();
        return view('wisataurban.showdetailSCBD', compact('destinations'));
    }

    public function showdetailseminyak() {
        $destinations = Destinasi::all();
        return view('wisataurban.showdetailseminyak', compact('destinations'));
    }

    public function showdetailsurabayanoth() {
        $destinations = Destinasi::all();
        return view('wisataurban.showdetailsurabayanoth', compact('destinations'));
    }

    public function delete() {
        $destinations = Destinasi::all(); // Ambil semua data destinasi
        return view('wisataurban.delete', compact('destinations')); // Kirim ke view sebagai $data
    }

    public function destroy($id) {
        Destinasi::destroy($id);
        return redirect()->back()->with('success', 'Destinasi berhasil dihapus');
    }
}
