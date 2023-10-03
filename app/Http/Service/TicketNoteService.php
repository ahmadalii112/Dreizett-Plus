<?php

namespace App\Http\Service;

use App\Http\Repositories\TicketNoteRepository;
use App\Notifications\TicketStatusChangedNotification;

class TicketNoteService extends BaseService
{
    public function __construct(TicketNoteRepository $ticketNoteRepository)
    {
        $this->repository = $ticketNoteRepository;
    }

    public function addNote($request, $ticket): void
    {
        if ($request->has('status')) {
            $ticket->update(['ticket_status' => $request->input('status')]);
            // Notify the user about the status change
            $ticket->user->notify(new TicketStatusChangedNotification($ticket, $request->input('note')));
        }
        $ticket->notes()->create($request->validated() + ['user_id' => auth()->id()]);
    }
}
