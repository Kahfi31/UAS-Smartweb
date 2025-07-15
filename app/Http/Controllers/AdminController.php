<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard with tourist and guide data
     */
    public function index()
    {
        // Fetch tourists (users with role 'tourist')
        $tourists = User::where('role', 'tourist')->orderBy('created_at', 'desc')->get();

        // Fetch guides (users with role 'guide')
        $guides = User::where('role', 'guide')->orderBy('created_at', 'desc')->get();

        // Get counts for statistics
        $touristCount = User::where('role', 'tourist')->count();
        $guideCount = User::where('role', 'guide')->count();
        $totalUsers = User::count();

        return view('admindatatourist', compact('tourists', 'guides', 'touristCount', 'guideCount', 'totalUsers'));
    }

    /**
     * Display only tourist data
     */
    public function touristData()
    {
        $tourists = User::where('role', 'tourist')->orderBy('created_at', 'desc')->get();
        $touristCount = $tourists->count();

        return view('admindatatourist', compact('tourists', 'touristCount'));
    }

        /**
     * Display only guide data
     */
    public function guideData()
    {
        $guides = User::where('role', 'guide')->orderBy('created_at', 'desc')->get();
        $guideCount = $guides->count();

        return view('admindataguide', compact('guides', 'guideCount'));
    }

    /**
     * Show the form for editing a user
     */
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit-user', compact('user'));
    }

    /**
     * Update the specified user
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:tourist,guide,admin',
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'User berhasil diperbarui');
    }

    /**
     * Delete the specified user
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus');
    }
}
