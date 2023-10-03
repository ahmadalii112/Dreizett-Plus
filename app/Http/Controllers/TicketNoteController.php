<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketNoteRequest;
use App\Http\Service\TicketNoteService;
use App\Models\Ticket;
use Illuminate\Http\RedirectResponse;

class TicketNoteController extends Controller
{
    protected TicketNoteService $ticketNoteService;

    public function __construct(TicketNoteService $ticketNoteService)
    {
        $this->ticketNoteService = $ticketNoteService;
    }

    public function __invoke(TicketNoteRequest $request, Ticket $ticket): RedirectResponse
    {
        $this->ticketNoteService->addNote($request, $ticket);

        return redirect()->route('tickets.show', $ticket)->with('notificationType', 'success')->with('notificationMessage', 'Note added successfully.');
    }
}
