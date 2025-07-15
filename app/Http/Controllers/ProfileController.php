<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{

    /**
     * Display the user's profile form (for profil.blade.php).
     */
    public function show(Request $request): View
    {
        return view('profil', [
            'user' => $request->user(),
        ]);
    }


        /**
     * Update the user's profile information (for profil.blade.php).
     */
    public function updateProfile(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Validate the request (only first_name, last_name, and avatar)
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar && Storage::disk('public')->exists('avatars/' . $user->avatar)) {
                Storage::disk('public')->delete('avatars/' . $user->avatar);
            }

            // Store new avatar
            $avatarFile = $request->file('avatar');
            $avatarName = time() . '_' . $avatarFile->getClientOriginalName();
            $avatarFile->storeAs('avatars', $avatarName, 'public');

            $user->avatar = $avatarName;
        }

        // Update only allowed user data (first_name and last_name)
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;

        $user->save();

        return Redirect::route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/login');
    }
}
