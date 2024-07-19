<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Post $post)
    {
        $posts = Post::with('author')->get(); // Ensure 'author' relationship is eager loaded


        return view('post', ['title' => 'Single Post', $posts]);
    }
}
