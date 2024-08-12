<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function index()
    {
        $data = [
            'quote' => $this->fetchQuote(),
            'title' => 'judul post',
            'posts' => Post::filter(request(['search', 'category']))->latest()->get(),
            'category' => Category::get()
        ];
        return view('posts', $data);
    }

    // public function refreshQuote(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $quote = $this->fetchQuote();
    //         return response()->json(['quote' => $quote]);
    //     }
    // }

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
}
