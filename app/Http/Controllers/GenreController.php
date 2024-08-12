<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $data = [

            'title' => 'genre',
            'nama' => 'ikbal maulana',
            'posts' => Post::filter(request(['search', 'category']))->latest()->get(),
            'category' => Category::get(),
            'images' => ['background1.jpg', 'background2.jpg', 'background3.jpg', 'background4.jpg', 'background5.jpg', 'background6.jpg', 'background7.jpg', 'background8.jpg', 'background9.jpg', 'background10.jpg', 'background.jpg'],
        ];
        return view('genre', $data);
    }
}
