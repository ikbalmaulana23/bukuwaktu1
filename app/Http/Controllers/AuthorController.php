<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function index(User $user)
    {
        $data = [
            'AuthUser' => $user,
            'user' => Auth::user(),
            'posts' => $user->posts,
            'followerCount' => $user->followers()->count(),
            'isFollowing' => Auth::check() && Auth::user()->following()->where('user_id', $user->id)->exists(),
            'audiobooks' => $user->audiobooks,
        ];

        return view('author', $data);
    }
}
