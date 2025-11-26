<?php

namespace App\Providers;


use App\Repositories\Interfaces\EventRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\EventRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
