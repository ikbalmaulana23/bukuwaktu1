<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Notifications\NewCommentNotification;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $post = Post::findOrFail($postId);

        $comment = $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
        ]);

        // Kirim notifikasi ke pemilik postingan
        // Jangan kirim kalau komentar berasal dari pemilik postingan sendiri
        if ($post->author_id !== auth()->id()) {
            $post->author->notify(
                new NewCommentNotification($comment)
            );
        }

        return redirect()->back()->with(
            'success',
            'Comment added successfully!'
        );
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== auth()->id()) {
            return redirect()->back()->with(
                'error',
                'Unauthorized action.'
            );
        }

        $comment->delete();

        return redirect()->back()->with(
            'success',
            'Comment deleted successfully!'
        );
    }
}
