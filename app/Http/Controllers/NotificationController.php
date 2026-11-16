<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Tandai notification sebagai sudah dibaca,
     * lalu arahkan user ke postingan terkait.
     */
    public function read($notification)
    {
        $user = Auth::user();

        $notification = $user->notifications()
            ->where('id', $notification)
            ->firstOrFail();

        $notification->markAsRead();

        $postId = $notification->data['post_id'] ?? null;

        if ($postId) {
            $post = Post::find($postId);

            if ($post) {
                return redirect()->route('posts.show', $post->slug);
            }
        }

        return redirect('/posts');
    }

    /**
     * Tandai semua notification sebagai sudah dibaca.
     */
    public function readAll()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return back();
    }
}
