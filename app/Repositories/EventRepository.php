<?php

namespace App\Repositories;

use App\Repositories\Interfaces\EventRepositoryInterface;
use App\Models\Event;

class EventRepository implements EventRepositoryInterface
{
    public function all()
    {
        return Event::all();
    }
    public function find($id)
    {
        return Event::find($id);
    }
    public function create(array $data)
    {
        return Event::create($data);
    }
    public function update(array $data, $id)
    {
        $event = Event::find($id);
        $event->update($data);
        return $event;
    }
    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();
    }
}
