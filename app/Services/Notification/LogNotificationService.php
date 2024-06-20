<?php

namespace App\Services\Notification;

use App\Models\User;
use Illuminate\Log\LogManager;

class LogNotificationService implements NotificationService
{

    public function __construct(protected LogManager $logManager)
    {
    }

    public function notify(User $user, string $text)
    {
        $email = $user->email;

        $this->logManager->info("Sent message to {$email} with text = $text");
    }
}
