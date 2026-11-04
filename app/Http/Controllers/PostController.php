<?php

namespace App\Http\Controllers;

use App\Models\Audiobook;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{

    public function home()
    {
        $data = [
            'title' => 'home',
            'posts' => Post::latest()->take(4)->get(),
            'audiobooks' => Audiobook::with('speaker')->latest()->take(4)->get(),

        ];
        return view('home', $data);
    }

    public function index(Request $request)
    {
        $data = [

            'title' => 'judul post',
            'posts' => Post::filter($request->only(['search', 'category']))->latest()->paginate(28),
            'categories' => Category::all(),
            'searchQuery' => $request->search, // Tambahkan ini untuk digunakan di view
            'selectedCategory' => $request->category,
        ];
        return view('posts', $data);
    }




    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('dashboard')->with('pesan', 'post has been deleted');
    }

    public function post(Post $post)
    {
        return view('post', ['title' => 'Single Post', 'post' => $post]);
    }
}
