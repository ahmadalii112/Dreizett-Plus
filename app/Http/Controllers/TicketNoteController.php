<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketNoteRequest;
use App\Http\Service\Ticket\TicketService;
use App\Http\Service\TicketNoteService;
use App\Models\Ticket;
use App\Notifications\TicketStatusChangedNotification;
use Illuminate\Http\RedirectResponse;

class TicketNoteController extends Controller
{
    protected TicketNoteService $ticketNoteService;

    protected TicketService $ticketService;

    public function __construct(TicketNoteService $ticketNoteService, TicketService $ticketService)
    {
        $this->ticketNoteService = $ticketNoteService;
        $this->ticketService = $ticketService;
    }

    public function __invoke(TicketNoteRequest $request, Ticket $ticket): RedirectResponse
    {
        if ($request->has('status')) {
            $this->ticketService->update(where: ['id' => $ticket->id], data: ['ticket_status' => $request->input('status')]);
            // Notify the user about the status change
            $ticket->user->notify(new TicketStatusChangedNotification($ticket, $request->input('note')));
        }
        $this->ticketNoteService->create(data: $request->validated() + ['user_id' => auth()->id(), 'ticket_id' => $ticket->id]);

        return redirect()->route('tickets.show', $ticket)->with('notificationType', 'success')->with('notificationMessage', 'Note added successfully.')->withFragment('ticket-note');
    }
}
