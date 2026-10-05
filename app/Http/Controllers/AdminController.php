<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Audiobook;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalPosts = Post::count();
        $totalAudiobooks = Audiobook::count();
        $totalComments = Comment::count();

        $latestUsers = User::latest()->take(5)->get();

        $latestPosts = Post::with('author')
            ->latest()
            ->take(5)
            ->get();

        $latestAudiobooks = Audiobook::latest()
            ->take(5)
            ->get();

        $latestComments = Comment::with('user', 'post')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalPosts',
            'totalAudiobooks',
            'totalComments',
            'latestUsers',
            'latestPosts',
            'latestAudiobooks',
            'latestComments'
        ));
    }

    public function users()
    {
        $users = User::latest()->get();

        return view('admin.users', compact('users'));
    }

    public function posts()
    {
        $posts = Post::with('author')
            ->latest()
            ->get();

        return view('admin.posts', compact('posts'));
    }

    public function audiobooks()
    {
        $audiobooks = Audiobook::latest()->get();

        return view('admin.audiobooks', compact('audiobooks'));
    }

    public function comments()
    {
        $comments = Comment::with('user', 'post')
            ->latest()
            ->get();

        return view('admin.comments', compact('comments'));
    }
}
