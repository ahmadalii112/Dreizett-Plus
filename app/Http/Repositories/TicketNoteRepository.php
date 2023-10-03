<?php

namespace App\Http\Repositories;

use App\Models\TicketNote;

class TicketNoteRepository extends BaseRepository
{
    public function __construct(TicketNote $ticketNote)
    {
        $this->model = $ticketNote;
    }
}
