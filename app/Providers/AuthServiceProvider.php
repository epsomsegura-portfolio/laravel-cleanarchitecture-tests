<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Src\Auth\Domain\Repositories\AuthRepositoryInterface;
use App\Src\Auth\Infrastructure\Persistence\EloquentAuthRepository;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, EloquentAuthRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
