<?php

namespace App\Providers;

use App\Repo\Post\EloquentPostRepo;
use App\Repo\Post\PostRepo;
use App\Repo\User\EloquentUserRepo;
use App\Repo\User\UserRepo;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PostRepo::class, EloquentPostRepo::class);
        $this->app->singleton(UserRepo::class, EloquentUserRepo::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
