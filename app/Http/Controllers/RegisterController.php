<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Tampilkan halaman registrasi.
     */
    public function showRegistrationForm()
    {
        return view('register');
    }

    /**
     * Proses registrasi user baru (tanpa name).
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|same:password_confirmation',
            'role' => 'required|in:tourist,guide,admin',
        ], [
            'password.same' => 'Password dan confirm password harus sesuai.',
        ]);

        // Generate random 6-character alphanumeric PIN (A-Z, 0-9)
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $pin = '';
        for ($i = 0; $i < 6; $i++) {
            $pin .= $characters[random_int(0, strlen($characters) - 1)];
        }

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'pin' => $pin,
        ]);

        // Login otomatis
        // Jangan login otomatis, langsung redirect ke login dengan PIN di session
        return redirect()->route('login')->with(['success' => 'Registrasi berhasil! Silakan login.', 'pin' => $pin]);
    }
}
