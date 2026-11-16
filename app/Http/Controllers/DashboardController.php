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
        $user = Auth::user();

        $posts = Post::where('author_id', $userId)->get();

        return view('dashboard.index', compact('userId', 'posts', 'user'));
    }

    public function posts()
    {
        $categories = Category::all();

        return view('dashboard.posts', compact('categories'));
    }

    public function edit($slug)
    {
        $categories = Category::all();
        $userId = Auth::id();

        $post = Post::where('slug', $slug)
            ->where('author_id', $userId)
            ->firstOrFail();

        return view('dashboard.edit', compact('post', 'userId', 'categories'));
    }

    public function uploadbuku(UploadBukuRequest $request)
    {
        $request->validated();

        $slug = Str::slug($request->title);

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
            'cover' => $coverPath,
            'type' => $request->type ?? 'rangkuman',
            'is_audited' => $request->is_audited ?? true,
        ]);

        $followers = Auth::user()->followers;

        foreach ($followers as $follower) {
            $follower->notify(new NewPostNotification($post));
        }

        return redirect('/posts')->with('pesan', 'Upload Buku berhasil');
    }

    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)
            ->where('author_id', Auth::id())
            ->firstOrFail();

        $request->validate([
            'title' => 'nullable|string|max:255',
            'body' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'category_id' => 'nullable|integer|exists:categories,id',
        ]);

        if ($request->hasFile('cover')) {
            if ($post->cover) {
                Storage::disk('public')->delete($post->cover);
            }

            $post->cover = $request->file('cover')->store('covers', 'public');
        }

        $post->title = $request->input('title', $post->title);
        $post->body = $request->input('body', $post->body);
        $post->category_id = $request->input('category_id', $post->category_id);

        $newSlug = Str::slug($post->title);

        if ($newSlug !== $post->slug) {
            $post->slug = $newSlug;
        }

        $post->save();

        return redirect('/posts')->with('pesan', 'Update Buku berhasil');
    }

    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('author_id', Auth::id())
            ->firstOrFail();

        if ($post->cover) {
            Storage::disk('public')->delete($post->cover);
        }

        $post->delete();

        return back()->with('pesan', 'Buku berhasil dihapus');
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
