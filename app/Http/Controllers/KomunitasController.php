<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KomunitasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $friends = [];
        if ($user) {
            $friends1 = DB::table('friendships')
                ->join('users', 'friendships.friend_id', '=', 'users.id')
                ->where('friendships.user_id', $user->id)
                ->select('users.id', 'users.first_name', 'users.last_name', 'users.avatar', 'users.pin')
                ->get();
            $friends2 = DB::table('friendships')
                ->join('users', 'friendships.user_id', '=', 'users.id')
                ->where('friendships.friend_id', $user->id)
                ->select('users.id', 'users.first_name', 'users.last_name', 'users.avatar', 'users.pin')
                ->get();
            $friends = $friends1->merge($friends2)->unique('id');
        }
        // Ambil 3 ulasan terbaru yang sudah ada rating dan ulasan
        $userReviews = \App\Models\VisitedPlace::whereNotNull('ulasan')->where('rating', '>', 0)->orderBy('created_at', 'desc')->take(3)->get();
        return view('komunitas', compact('friends', 'userReviews'));
    }
}
