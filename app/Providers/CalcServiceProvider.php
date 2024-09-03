<?php

namespace App\Providers;

use App\Calc\CalcImpl;
use App\Calc\ICalc;
use Illuminate\Support\ServiceProvider;

class CalcServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ICalc::class, CalcImpl::class);
        $this->app->bind('calc', CalcImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
