<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Controllers\Controller;
use App\Services\EventService;

class EventController extends Controller
{

    protected $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function index()
    {
        $events = $this->eventService->getLatestEvents(3);
        return response()->json($events);
    }

    public function store(StoreEventRequest $request)
    {
        if ($request->validated()) {
            $event = $this->eventService->createEvent($request->validated());
            return response()->json($event, 201);
        }
    }
}
