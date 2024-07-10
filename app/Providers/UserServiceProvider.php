<?php

namespace App\Providers;

use App\Classes\User\UserRepository;
use App\Interfaces\User\UserRepositoryInterface;
use App\Interfaces\User\UserServiceInterface;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
       $this->app->bind(UserServiceInterface::class, UserService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
