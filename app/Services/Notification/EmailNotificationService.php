<?php

namespace App\Services\Notification;

use App\Models\User;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class EmailNotificationService implements NotificationService
{
    public function __construct(protected string $from)
    {

    }

    public function notify(User $user, string $text)
    {
        $from = $this->from;
        Mail::raw($text, function (Message $message) use ($user, $from) {
            $message->from($from);
            $message->to($user->email);
            $message->subject("Laravel Notification");
        });
    }
}
