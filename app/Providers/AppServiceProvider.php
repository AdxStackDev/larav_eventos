<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use App\Observers\EventObserver;
use App\Events\GlobalEvent;
use App\Models\Event;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(181);
        Event::observe(EventObserver::class);

        Gate::define('update-event', function (User $user, Event $event) {
            return $user->id === $event->user_id;
        });
    }
}
