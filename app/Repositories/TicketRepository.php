<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TicketRepositoryInterface;
use App\Models\Ticket;

class TicketRepository implements TicketRepositoryInterface
{
    public function all()
    {
        return Ticket::all();
    }

    public function find($id)
    {
        return Ticket::find($id);
    }

    public function create(array $data)
    {
        return Ticket::create($data);
    }

    public function update(array $data, $id)
    {
        $ticket = Ticket::find($id);
        if ($ticket) {
            $ticket->update($data);
            return $ticket;
        }
        return null;
    }

    public function delete($id)
    {
        $ticket = Ticket::find($id);
        if ($ticket) {
            $ticket->delete();
            return true;
        }
        return false;
    }
}
