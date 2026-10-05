<?php

namespace App\Http\Controllers;

use App\Models\LoungeComment;
use App\Models\LoungePost;
use Illuminate\Http\Request;

class LoungeCommentController extends Controller
{
    public function store(Request $request, LoungePost $loungePost)
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'max:500'],
        ]);

        LoungeComment::create([
            'lounge_post_id' => $loungePost->id,
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        return back()->with('pesan', 'Komentar berhasil ditambahkan.');
    }
}
