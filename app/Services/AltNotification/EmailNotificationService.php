<?php

namespace App\Services\AltNotification;

use App\Models\Post;
use App\Models\User;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class EmailNotificationService implements NotificationService
{
    public function notify(User $user, string $text)
    {
        $from = "sdf@localhost";
        Mail::raw($text, function (Message $message) use ($user, $from) {
            $message->from($from);
            $message->to($user->email);
            $message->subject("Laravel Notification");
        });
    }

    public function newPostNotification(User $user, Post $newPost)
    {
        $this->notify($user, "New post with id = {$newPost->id}, title={$newPost->title}, text={$newPost->text} created");
    }
}
