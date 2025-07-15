<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;

class WisataBudayaController extends Controller
{
    public function create() {
        return view('wisatabudaya.create');
    }

    public function store(Request $request) {
        Destinasi::create($request->all());
        return redirect()->route('wisatabudaya.store')->with('success', 'Destinasi berhasil ditambahkan');
    }

    public function show() {
        $destinations = Destinasi::all();
        return view('wisatabudaya.show', compact('destinations'));
    }

    public function showdetailborobudur() {
        $destinations = Destinasi::all();
        return view('wisatabudaya.showdetailborobudur', compact('destinations'));
    }

    public function showdetailcetho() {
        $destinations = Destinasi::all();
        return view('wisatabudaya.showdetailcetho', compact('destinations'));
    }

    public function showdetailfatahillah() {
        $destinations = Destinasi::all();
        return view('wisatabudaya.showdetailfatahillah', compact('destinations'));
    }

    public function showdetailkeraton() {
        $destinations = Destinasi::all();
        return view('wisatabudaya.showdetailkeraton', compact('destinations'));
    }

    public function showdetailmajapahit() {
        $destinations = Destinasi::all();
        return view('wisatabudaya.showdetailmajapahit', compact('destinations'));
    }

    public function showdetailprambanan() {
        $destinations = Destinasi::all();
        return view('wisatabudaya.showdetailprambanan', compact('destinations'));
    }

    public function showdetailrotterdam() {
        $destinations = Destinasi::all();
        return view('wisatabudaya.showdetailrotterdam', compact('destinations'));
    }

    public function showdetailvredeburg() {
        $destinations = Destinasi::all();
        return view('wisatabudaya.showdetailvredeburg', compact('destinations'));
    }

    public function delete() {
        $destinations = Destinasi::all(); // Ambil semua data destinasi
        return view('wisatabudaya.delete', compact('destinations')); // Kirim ke view sebagai $data
    }

    public function destroy($id) {
        Destinasi::destroy($id);
        return redirect()->back()->with('success', 'Destinasi berhasil dihapus');
    }
}
