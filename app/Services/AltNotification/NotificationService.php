<?php

namespace App\Services\AltNotification;

use App\Models\Post;
use App\Models\User;

interface NotificationService
{
    public function notify(User $user, string $text);
    public function newPostNotification(User $user, Post $newPost);
}
