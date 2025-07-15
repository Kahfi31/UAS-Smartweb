<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Destinasi;

class WisataAlamController extends Controller
{
    public function create() {
        return view('wisataalam.create');
    }

    public function store(Request $request) {
        Destinasi::create($request->all());
        return redirect()->back()->with('success', 'Destinasi berhasil ditambahkan');
    }

    public function show() {
        $destinations = Destinasi::all();
        return view('wisataalam.show', compact('destinations'));
    }

    public function showdetailbromo() {
        $destinations = Destinasi::all();
        return view('wisataalam.showdetailbromo', compact('destinations'));
    }

    public function showdetaildanaukelimutu() {
        $destinations = Destinasi::all();
        return view('wisataalam.showdetaildanaukelimutu', compact('destinations'));
    }

    public function showdetaildanautoba() {
        $destinations = Destinasi::all();
        return view('wisataalam.showdetaildanautoba', compact('destinations'));
    }

    public function showdetailkawahijen() {
        $destinations = Destinasi::all();
        return view('wisataalam.showdetailkawahijen', compact('destinations'));
    }

    public function showdetailpulaukomodo() {
        $destinations = Destinasi::all();
        return view('wisataalam.showdetailpulaukomodo', compact('destinations'));
    }

    public function showdetailrajaampat() {
        $destinations = Destinasi::all();
        return view('wisataalam.showdetailrajampat', compact('destinations'));
    }

    public function showdetailtangkubanperahu() {
        $destinations = Destinasi::all();
        return view('wisataalam.showdetailtangkubanperahu', compact('destinations'));
    }

    public function showdetailtumpaksewu() {
        $destinations = Destinasi::all();
        return view('wisataalam.showdetailtumpaksewu', compact('destinations'));
    }

    public function delete() {
        $destinations = Destinasi::all();
        return view('wisataalam.delete', compact('destinations'));
    }

    public function destroy($id) {
        Destinasi::destroy($id);
        return redirect()->back()->with('success', 'Destinasi berhasil dihapus');
    }
}
