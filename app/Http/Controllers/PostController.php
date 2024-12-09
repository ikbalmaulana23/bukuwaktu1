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
            'audiobooks' => Audiobook::latest()->take(4)->get(),

        ];
        return view('home', $data);
    }

    public function index(Request $request)
    {
        $data = [
            'quote' => $this->fetchQuote(),
            'title' => 'judul post',
            'posts' => Post::filter($request->only(['search', 'category']))->latest()->paginate(28),
            'categories' => Category::all(),
            'searchQuery' => $request->search, // Tambahkan ini untuk digunakan di view
            'selectedCategory' => $request->category,
        ];
        return view('posts', $data);
    }


    private function fetchQuote()
    {
        $response = Http::get('https://dummyjson.com/quotes');
        $quotes = $response->json();

        // Periksa apakah 'quotes' ada dan tidak kosong
        if (isset($quotes['quotes']) && count($quotes['quotes']) > 0) {
            // Pilih quote secara acak
            $randomIndex = array_rand($quotes['quotes']);
            return $quotes['quotes'][$randomIndex];
        }

        // Kembalikan default jika tidak ada quote
        return ['quote' => 'Quote not found.', 'author' => 'Unknown author'];
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('dashboard')->with('pesan', 'post has been deleted');
    }
}
