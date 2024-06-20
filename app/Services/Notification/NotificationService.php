<?php

namespace App\Services\Notification;

use App\Models\User;

interface NotificationService
{
    public function notify(User $user, string $text);
}
