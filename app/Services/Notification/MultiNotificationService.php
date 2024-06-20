<?php

namespace App\Services\Notification;

use App\Models\User;

class MultiNotificationService implements NotificationService
{
    protected array $services;

    public function __construct(NotificationService ...$services)
    {
        $this->services = $services;
    }

    public function notify(User $user, string $text)
    {
        $services = $this->services;

        foreach ($services as $service) {
            $service->notify($user, $text);
        }
    }
}
