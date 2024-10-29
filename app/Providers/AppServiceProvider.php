<?php

namespace App\Providers;

use App\Interfaces\GuestRepositoryInterface;
use App\Interfaces\GuestServiceInterface;
use App\Repositories\GuestRepository;
use App\Services\GuestService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GuestServiceInterface::class, GuestService::class);
        $this->app->bind(GuestRepositoryInterface::class, GuestRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
