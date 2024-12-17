<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori dari database
        return view('dashboard.posts', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|integer|exists:users,id',
            'category_id' => 'required|integer|exists:categories,id',
            'body' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
        ]);

        $slug = Str::slug($request->title);

        // Proses upload cover
        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        Post::create([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'slug' => $slug,
            'body' => $request->body,
            'cover' => $coverPath,
            'type' => $request->type ?? 'rangkuman',
            'is_audited' => $request->is_audited ?? true,
        ]);

        return  redirect()->route('posts')->with('pesan', 'Upload Buku berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post', ['title' => 'Single Post', 'post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the post by ID
        $categories = Category::all();
        $userId = Auth::id();
        $post = Post::findOrFail($id);

        // Pass the post to the edit view
        return view('dashboard.edit', compact('post', 'userId', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Coba untuk mencari post berdasarkan ID
        $post = Post::findOrFail($id); // Menggunakan findOrFail untuk memastikan post ditemukan

        // Validasi input
        $request->validate([
            'title' => 'nullable|string|max:255',
            'body' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'category_id' => 'nullable|integer|exists:categories,id',
        ]);

        // Update cover jika ada file baru
        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($post->cover) {
                Storage::disk('public')->delete($post->cover);
            }
            $coverPath = $request->file('cover')->store('covers', 'public');
            $post->cover = $coverPath;
        }

        // Update field lainnya
        $post->title = $request->input('title', $post->title);
        $post->body = $request->input('body', $post->body);
        $post->category_id = $request->input('category_id', $post->category_id);

        // Update slug jika title diubah
        if ($request->filled('title') && $request->input('title') != $post->title) {
            $post->slug = Str::slug($request->input('title'));
        }

        // Simpan perubahan
        $post->save();

        return redirect()->route('posts')->with('pesan', 'Post berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('dashboard')->with('pesan', 'Post berhasil dihapus');
    }
}
