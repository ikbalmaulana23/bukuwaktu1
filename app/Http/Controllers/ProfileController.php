<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Post::where('author_id', auth()->id())->get();
        $audiobooks = $user->audiobooks; // Pastikan ini adalah koleksi atau array, bukan null

        // Debugging


        return view('profile.index', compact('user', 'audiobooks', 'posts',));
    }
}
