<?php

namespace App\Jobs;

use App\Services\Notification\LogNotificationService;
use App\Services\SendEmailLogBackend;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldBeEncrypted;

class SendMail implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public string $email, public string $subject, public string $text)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(SendEmailLogBackend $emailLogBackend): void
    {
        $emailLogBackend->sendEmail($this->email, $this->subject, $this->text);

    }

    public function uniqueId(): string
    {
        return $this->email;
    }
}
