<?php

namespace App\Observers;

use App\Models\Event;
use App\Events\GlobalEvent;
use Illuminate\Support\Facades\Log;

class EventObserver
{
    /**
     * Handle the Event "created" event.
     */
    public function created(Event $event): void
    {
        $event->start_time = '2025-11-11 12:00:00';
        $event->end_time = '2025-11-11 12:00:00';
        $event->save();
        Log::info('Observer::Event created successfully: ' . $event->title);

        // Dispatch the GlobalEvent to trigger listeners
        GlobalEvent::dispatch($event);
    }

    /**
     * Handle the Event "updated" event.
     */
    public function updated(Event $event): void
    {
        Log::info('Observer::Event updated successfully: ' . $event->title);
    }

    /**
     * Handle the Event "deleted" event.
     */
    public function deleted(Event $event): void
    {
        Log::info('Observer::Event deleted successfully: ' . $event->title);
    }

    /**
     * Handle the Event "restored" event.
     */
    public function restored(Event $event): void
    {
        Log::info('Observer::Event restored successfully: ' . $event->title);
    }

    /**
     * Handle the Event "force deleted" event.
     */
    public function forceDeleted(Event $event): void
    {
        Log::info('Observer::Event force deleted successfully: ' . $event->title);
    }
}
