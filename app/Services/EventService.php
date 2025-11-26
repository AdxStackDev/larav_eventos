<?php

namespace App\Services;

use App\Repositories\Interfaces\EventRepositoryInterface;
use App\Models\Event;

class EventService
{
    protected $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Get the latest events.
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLatestEvents(int $limit = 5)
    {
        return Event::latest()->limit($limit)->get();
    }

    public function createEvent(array $data)
    {
        return $this->eventRepository->create($data);
    }
}
