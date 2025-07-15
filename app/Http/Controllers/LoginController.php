<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login (untuk akses dari browser)
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login (Mendukung Web & API)
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            // 🔹 Jika request dari API (Supertest), kembalikan JSON
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Login successful',
                    'user' => Auth::user() // Kirim data user jika perlu
                ], 200);
            }

            // 🔹 Jika dari browser, redirect ke halaman home + notifikasi sukses
            $pin = Auth::user()->pin;
            return redirect('/')->with(['success' => 'Berhasil login!', 'pin' => $pin]);
        }

        // Jika gagal login
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // 🔹 Jika dari browser, kembali dengan notifikasi gagal
        return back()->with('error', 'Email atau password salah atau akun belum terdaftar.')
                     ->withInput($request->only('email'));
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Logged out successfully'], 200);
        }

        return redirect('/login');
    }
}
