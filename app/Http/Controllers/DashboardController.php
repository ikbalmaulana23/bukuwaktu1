<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Audiobook;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UploadBukuRequest;
use App\Notifications\NewPostNotification;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $user = Auth::user(); // atau metode lain untuk mendapatkan data pengguna

        $posts = Post::where('author_id', $userId)->get();

        // Pass data to the view
        return view('dashboard.index', compact('userId', 'posts', 'user'));
    }



    public function posts()
    {
        $categories = Category::all(); // Ambil semua kategori dari database
        return view('dashboard.posts', compact('categories'));
    }

    public function edit($id)
    {
        // Find the post by ID
        $categories = Category::all();
        $userId = Auth::id();
        $post = Post::findOrFail($id);

        // Pass the post to the edit view
        return view('dashboard.edit', compact('post', 'userId', 'categories'));
    }
    public function uploadbuku(UploadBukuRequest $request)
    {
        if ($request->validated()) {
            $slug = Str::slug($request->title);

            // Proses upload cover
            $coverPath = null;
            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('covers', 'public');
            }

            // Buat postingan dengan field tambahan
            $post = Post::create([
                'title' => $request->title,
                'author_id' => $request->author_id,
                'category_id' => $request->category_id,
                'slug' => $slug,
                'body' => $request->body,
                'cover' => $coverPath, // Simpan path cover ke database
                'type' => $request->type ?? 'rangkuman', // Gunakan 'rangkuman' sebagai default jika tidak diisi
                'is_audited' => $request->is_audited ?? true, // Default true jika tidak diisi
            ]);
        }

        // Ambil followers dari user yang membuat postingan
        $followers = Auth::user()->followers;

        // Kirim notifikasi hanya kepada followers
        foreach ($followers as $follower) {
            $follower->notify(new NewPostNotification($post));
        }

        return redirect('/posts')->with('pesan', 'Upload Buku berhasil');
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'body' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'category_id' => 'nullable|integer|exists:categories,id',
        ]);

        $user = Auth::user(); // Dapatkan user yang sedang login

        // Update cover jika ada cover baru
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
        $post->author_id = $user->id; // Tetap set author_id ke ID user yang login
        $post->slug = Str::slug($post->title); // Update slug jika title berubah

        $post->save(); // Simpan perubahan


        return redirect('/posts')->with('pesan', 'Update Buku berhasil');
    }

    public function audiobook()
    {
        $userId = Auth::id();
        $audiobooks = Audiobook::where('speaker_id', $userId)->get();

        return view('dashboard.indexaudiobook', compact('audiobooks'));
    }

    public function save()
    {
        return view('dashboard.save');
    }

    public function baru()
    {
        return view('dashboard.baru');
    }
}
