<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function edit($id)
    {
        // Find the post by ID
        $userId = Auth::id();
        $post = Post::findOrFail($id);

        // Pass the post to the edit view
        return view('dashboard.edit', compact('post', 'userId'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            // Add other fields you want to validate
        ]);

        // Find the post by ID
        $post = Post::findOrFail($id);

        // Update the post with new data
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            // Add other fields to be updated
        ]);

        // Redirect back with a success message
        return redirect()->route('dashboard')->with('pesan', 'Post updated successfully');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('dashboard')->with('pesan', 'post has been deleted');
    }
}
