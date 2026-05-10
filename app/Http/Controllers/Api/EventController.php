<?php

namespace App\Http\Controllers\Api;

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
        $events = $this->eventService->getLatestEvents(10);
        return response()->json([
            'success' => true,
            'data' => $events
        ]);
    }

    public function show($id)
    {
        $event = $this->eventService->getEventWithRelations($id);
        
        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $event
        ]);
    }

    public function store(StoreEventRequest $request)
    {
        $event = $this->eventService->createEvent($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Event created successfully',
            'data' => $event
        ], 201);
    }

    public function update(StoreEventRequest $request, $id)
    {
        $event = $this->eventService->updateEvent($id, $request->validated());
        
        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Event updated successfully',
            'data' => $event
        ]);
    }

    public function destroy($id)
    {
        $deleted = $this->eventService->deleteEvent($id);
        
        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Event deleted successfully'
        ]);
    }
}
