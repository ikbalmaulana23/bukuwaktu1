<?php

namespace App\Notifications;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewCommentNotification extends Notification
{
    use Queueable;

    public $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'new_comment',
            'message' => $this->comment->user->name . ' mengomentari postingan kamu.',
            'post_id' => $this->comment->post_id,
            'comment_id' => $this->comment->id,
            'user_id' => $this->comment->user_id,
        ];
    }
}
