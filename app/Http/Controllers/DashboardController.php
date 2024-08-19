<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Audiobook;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadBukuRequest;
use App\Notifications\NewPostNotification;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Get posts created by the logged-in user
        $posts = Post::where('author_id', $userId)->get();

        // Pass data to the view
        return view('dashboard.index', compact('userId', 'posts'));
    }

    public function posts()
    {
        return view('dashboard.posts');
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

            $post = Post::create([
                'title' => $request->title,
                'author_id' => $request->author_id,
                'category_id' => $request->category_id,
                'slug' => $slug,
                'body' => $request->body,
                'cover' => $coverPath,  // Simpan path cover ke database
            ]);
        }

        // Ambil followers dari user yang membuat postingan
        $followers = Auth::user()->followers;

        // Kirim notifikasi hanya kepada followers
        foreach ($followers as $follower) {
            $follower->notify(new NewPostNotification($post));
        }

        return redirect('/')->with('pesan', 'Upload Buku berhasil');
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
}
