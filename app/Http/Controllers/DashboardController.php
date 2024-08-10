<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadBukuRequest;
use App\Notifications\NewPostNotification;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function uploadbuku(UploadBukuRequest $request)
    {


        if ($request->validated()) {
            $slug = Str::slug($request->title);
            $post = Post::create([
                'title' => $request->title,
                'author_id' => $request->author_id,
                'category_id' => $request->category_id,
                'slug' => $slug,
                'body' => $request->body,
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
}
