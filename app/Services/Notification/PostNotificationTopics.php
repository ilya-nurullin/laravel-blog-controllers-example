<?php

namespace App\Services\Notification;

use App\Models\Post;
use App\Models\User;

interface PostNotificationTopics
{
    public function newPostNotification(User $user, Post $newPost);
}
