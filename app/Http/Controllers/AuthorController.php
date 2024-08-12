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
            'AuthUser' => $user, // Pastikan $user dikirimkan ke view
            'user' => Auth::user(), // Optional: Mengirimkan user yang sedang login
            'posts' => $user->posts
        ];

        return view('category', $data);
    }
}
