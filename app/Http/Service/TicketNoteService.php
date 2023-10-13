<?php

namespace App\Http\Service;

use App\Http\Repositories\TicketNoteRepository;

class TicketNoteService extends BaseService
{
    public function __construct(TicketNoteRepository $ticketNoteRepository)
    {
        $this->repository = $ticketNoteRepository;
    }
}
