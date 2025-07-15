<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function showTambahTeman()
    {
        return view('tambahteman');
    }

    public function addFriend(Request $request)
    {
        $request->validate([
            'pin' => 'required|string|max:6'
        ]);

        $pin = $request->input('pin');
        $currentUser = Auth::user();

        // Check if user is trying to add themselves
        if ($currentUser->pin === $pin) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak dapat menambahkan diri sendiri sebagai teman'
            ]);
        }

        // Find user by PIN
        $friend = User::where('pin', $pin)->first();

        if (!$friend) {
            return response()->json([
                'success' => false,
                'message' => 'PIN tidak valid atau teman tidak ditemukan'
            ]);
        }

        // Check if friendship already exists
        $existingFriendship = DB::table('friendships')
            ->where(function($query) use ($currentUser, $friend) {
                $query->where('user_id', $currentUser->id)
                      ->where('friend_id', $friend->id);
            })
            ->orWhere(function($query) use ($currentUser, $friend) {
                $query->where('user_id', $friend->id)
                      ->where('friend_id', $currentUser->id);
            })
            ->first();

        if ($existingFriendship) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah berteman dengan pengguna ini'
            ]);
        }

        // Create friendship
        DB::table('friendships')->insert([
            'user_id' => $currentUser->id,
            'friend_id' => $friend->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Teman berhasil ditambahkan!',
            'friend' => [
                'id' => $friend->id,
                'name' => $friend->first_name . ' ' . $friend->last_name,
                'pin' => $friend->pin
            ]
        ]);
    }

    public function getFriends()
    {
        $currentUser = Auth::user();

        $friends = DB::table('friendships')
            ->join('users', function($join) use ($currentUser) {
                $join->on('friendships.friend_id', '=', 'users.id')
                     ->where('friendships.user_id', $currentUser->id);
            })
            ->select('users.id', 'users.first_name', 'users.last_name', 'users.pin', 'users.avatar')
            ->get();

        // Also get users who added current user as friend
        $inverseFriends = DB::table('friendships')
            ->join('users', function($join) use ($currentUser) {
                $join->on('friendships.user_id', '=', 'users.id')
                     ->where('friendships.friend_id', $currentUser->id);
            })
            ->select('users.id', 'users.first_name', 'users.last_name', 'users.pin', 'users.avatar')
            ->get();

        // Merge and remove duplicates
        $allFriends = $friends->merge($inverseFriends)->unique('id');

        return response()->json([
            'success' => true,
            'friends' => $allFriends
        ]);
    }

    public function generatePin()
    {
        $currentUser = Auth::user();

        // Generate a random 6-digit PIN
        do {
            $pin = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        } while (User::where('pin', $pin)->where('id', '!=', $currentUser->id)->exists());

        // Update user's PIN
        $currentUser->update(['pin' => $pin]);

        return response()->json([
            'success' => true,
            'pin' => $pin
        ]);
    }

    public function seedDummyFriends()
    {
        $currentUser = Auth::user();

        // Create some dummy users if they don't exist
        $dummyUsers = [
            [
                'first_name' => 'Ahmad',
                'last_name' => 'Rizki',
                'email' => 'ahmad.rizki@example.com',
                'password' => bcrypt('password'),
                'pin' => '123456'
            ],
            [
                'first_name' => 'Siti',
                'last_name' => 'Nurhaliza',
                'email' => 'siti.nurhaliza@example.com',
                'password' => bcrypt('password'),
                'pin' => '234567'
            ],
            [
                'first_name' => 'Budi',
                'last_name' => 'Santoso',
                'email' => 'budi.santoso@example.com',
                'password' => bcrypt('password'),
                'pin' => '345678'
            ]
        ];

        foreach ($dummyUsers as $dummyUser) {
            $user = User::firstOrCreate(
                ['email' => $dummyUser['email']],
                $dummyUser
            );

            // Create friendship if it doesn't exist
            $existingFriendship = DB::table('friendships')
                ->where(function($query) use ($currentUser, $user) {
                    $query->where('user_id', $currentUser->id)
                          ->where('friend_id', $user->id);
                })
                ->orWhere(function($query) use ($currentUser, $user) {
                    $query->where('user_id', $user->id)
                          ->where('friend_id', $currentUser->id);
                })
                ->first();

            if (!$existingFriendship) {
                DB::table('friendships')->insert([
                    'user_id' => $currentUser->id,
                    'friend_id' => $user->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Dummy friends added successfully'
        ]);
    }
}
