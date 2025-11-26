<?php

namespace App\Listeners;

use App\Events\GlobalEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendEventNotification
{
    
    use InteractsWithQueue;
    
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(GlobalEvent $event): void
    {
        Log::info("A new Event triggered: " . $event->event->name);
    }
}
