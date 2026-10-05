<?php

namespace App\Http\Controllers;

use App\Models\LoungePost;
use Illuminate\Http\Request;

class LoungeController extends Controller
{
    public function index()
    {
        $loungePosts = LoungePost::with(['user', 'comments.user'])
            ->whereHas('user')
            ->withCount('comments')
            ->latest()
            ->paginate(10);

        return view('lounge.index', [
            'loungePosts' => $loungePosts,
            'title' => 'Lounge',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'max:1000'],
        ]);

        LoungePost::create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        return redirect()
            ->route('lounge.index')
            ->with('pesan', 'Postingan berhasil dibuat.');
    }
}
