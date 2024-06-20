<?php

namespace App\Providers;

use App\Services\Notification\EmailNotificationService;
use App\Services\Notification\LogNotificationService;
use App\Services\Notification\MultiNotificationService;
use App\Services\Notification\NotificationService;
use App\Services\Notification\PostNotificationTopics;
use App\Services\Notification\PostNotificationTopicsImpl;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('error', function (){
            return 0;
        });
//        $this->app->bind(NotificationService::class, LogNotificationService::class);
        $this->app->bind(NotificationService::class, EmailNotificationService::class);
        $this->app->bind(PostNotificationTopics::class, PostNotificationTopicsImpl::class);

        $this->app->when(EmailNotificationService::class)
            ->needs('$from')
            ->give('NotificationServiceProvider@laravel.local');

        $this->app->tag([EmailNotificationService::class, LogNotificationService::class], 'notificationServices');

        $this->app->when(MultiNotificationService::class)
            ->needs(NotificationService::class)
            ->giveTagged('notificationServices');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
