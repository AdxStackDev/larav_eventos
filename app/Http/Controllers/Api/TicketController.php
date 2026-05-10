<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Controllers\Controller;
use App\Services\TicketService;

class TicketController extends Controller
{
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function index()
    {
        $tickets = $this->ticketService->getAllTickets();
        return response()->json([
            'success' => true,
            'data' => $tickets
        ]);
    }

    public function show($id)
    {
        $ticket = $this->ticketService->getTicketWithRelations($id);
        
        if (!$ticket) {
            return response()->json([
                'success' => false,
                'message' => 'Ticket not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $ticket
        ]);
    }

    public function store(StoreTicketRequest $request)
    {
        $ticket = $this->ticketService->createTicket($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Ticket created successfully',
            'data' => $ticket
        ], 201);
    }

    public function update(StoreTicketRequest $request, $id)
    {
        $ticket = $this->ticketService->updateTicket($id, $request->validated());
        
        if (!$ticket) {
            return response()->json([
                'success' => false,
                'message' => 'Ticket not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Ticket updated successfully',
            'data' => $ticket
        ]);
    }

    public function destroy($id)
    {
        $deleted = $this->ticketService->deleteTicket($id);
        
        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Ticket not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Ticket deleted successfully'
        ]);
    }
}
