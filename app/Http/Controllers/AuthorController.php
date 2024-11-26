<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index(User $user)
    {
        // Data yang akan dikirim ke view
        $data = [
            'AuthUser' => $user, // Profil pengguna yang dilihat
            'user' => Auth::user(), // User yang sedang login
            'posts' => $user->posts, // Postingan milik pengguna
            'followerCount' => $user->followers()->count(), // Jumlah followers
            'isFollowing' => Auth::check() && Auth::user()->following()->where('user_id', $user->id)->exists(), // Status follow/unfollow
            'audiobooks' => $user->audiobooks, // Audiobook yang diunggah pengguna
            'favoriteBooks' => $user->favoriteBooks, // Buku favorit pengguna
        ];

        return view('author', $data);
    }
}
