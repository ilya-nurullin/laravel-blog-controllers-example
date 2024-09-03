<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class SendEmailLogBackend
{
    public function sendEmail(string $email, string $subject, string $text)
    {
        Log::info("Email sent", compact('email', 'subject', 'text'));
    }
}
