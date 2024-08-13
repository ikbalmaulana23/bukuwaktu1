<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function index(User $user)
    {
        $data = [
            'AuthUser' => $user, // Penulis post
            'user' => Auth::user(), // User yang sedang login
            'posts' => $user->posts,
            'followerCount' => $user->followers()->count(), // Jumlah followers
            'isFollowing' => Auth::check() && Auth::user()->following()->where('user_id', $user->id)->exists(), // Status following
        ];

        return view('category', $data);
    }
}
