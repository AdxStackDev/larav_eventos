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
        return Event::with(['user', 'category', 'location'])
            ->latest()
            ->limit($limit)
            ->get();
    }

    /**
     * Get event with all relationships.
     *
     * @param string $id
     * @return Event|null
     */
    public function getEventWithRelations($id)
    {
        return Event::with(['user', 'category', 'location', 'tickets', 'subscriptions'])
            ->find($id);
    }

    public function createEvent(array $data)
    {
        return $this->eventRepository->create($data);
    }

    public function updateEvent($id, array $data)
    {
        return $this->eventRepository->update($data, $id);
    }

    public function deleteEvent($id)
    {
        return $this->eventRepository->delete($id);
    }
}
