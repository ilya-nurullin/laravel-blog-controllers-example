<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;

class MyIntProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('sdf', function () {
            return User::all()[0];
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
