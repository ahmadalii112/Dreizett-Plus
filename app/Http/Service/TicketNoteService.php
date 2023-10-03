<?php

namespace App\Http\Service;

use App\Http\Repositories\TicketNoteRepository;

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
        }
        $ticket->notes()->create($request->validated() + ['user_id' => auth()->id()]);
    }
}
