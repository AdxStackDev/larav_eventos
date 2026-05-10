<?php

namespace App\Services;

use App\Repositories\Interfaces\TicketRepositoryInterface;
use App\Models\Ticket;

class TicketService
{
    protected $ticketRepository;

    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function getAllTickets()
    {
        return Ticket::with(['event', 'category', 'location'])->get();
    }

    public function getTicketWithRelations($id)
    {
        return Ticket::with(['event', 'category', 'location'])->find($id);
    }

    public function createTicket(array $data)
    {
        return $this->ticketRepository->create($data);
    }

    public function updateTicket($id, array $data)
    {
        return $this->ticketRepository->update($data, $id);
    }

    public function deleteTicket($id)
    {
        return $this->ticketRepository->delete($id);
    }
}
