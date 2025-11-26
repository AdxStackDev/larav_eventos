<?php

namespace App\Observers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class EventObserver
{
    /**
     * Handle the Event "created" event.
     */
    public function created(Event $event): void
    {
        $event->Slug = Str::slug($event->name);
        Log::info('Observer::Event created successfully: ' . $event->name);
    }

    /**
     * Handle the Event "updated" event.
     */
    public function updated(Event $event): void
    {
        Log::info('Observer::Event updated successfully: ' . $event->name);
    }

    /**
     * Handle the Event "deleted" event.
     */
    public function deleted(Event $event): void
    {
        Log::info('Observer::Event deleted successfully: ' . $event->name);
    }

    /**
     * Handle the Event "restored" event.
     */
    public function restored(Event $event): void
    {
        Log::info('Observer::Event restored successfully: ' . $event->name);
    }

    /**
     * Handle the Event "force deleted" event.
     */
    public function forceDeleted(Event $event): void
    {
        Log::info('Observer::Event force deleted successfully: ' . $event->name);
    }
}
