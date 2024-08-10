<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'judul post',
            'posts' => Post::filter(request(['search', 'category']))->latest()->get(),
            'category' => Category::get()
        ];
        return view('posts', $data);
    }
}
