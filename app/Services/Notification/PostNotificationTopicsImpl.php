<?php

namespace App\Services\Notification;

use App\Models\Post;
use App\Models\User;

class PostNotificationTopicsImpl implements PostNotificationTopics
{
    public function __construct(protected NotificationService $notificationService)
    {
    }

    public function newPostNotification(User $user, Post $newPost)
    {
        $this->notificationService->notify($user, "New post with id = {$newPost->id}, title={$newPost->title}, text={$newPost->text} created");
    }
}
