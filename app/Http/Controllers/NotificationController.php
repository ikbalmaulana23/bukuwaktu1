<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /** * Tandai notification sebagai sudah dibaca, * lalu arahkan user ke postingan terkait. */ public function read($notification)
    {
        $user = Auth::user();
        $notification = $user->notifications()->where('id', $notification)->firstOrFail();
        $notification->markAsRead();
        $postId = $notification->data['post_id'] ?? null;
        if ($postId) {
            return redirect()->route('posts.show', $postId);
        }
        return redirect('/posts');
    }
    /** * Tandai semua notification sebagai sudah dibaca. */ public function readAll()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return back();
    }
}
