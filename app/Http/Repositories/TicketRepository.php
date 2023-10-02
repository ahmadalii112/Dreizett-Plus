<?php

namespace App\Http\Repositories;

use App\Models\Ticket;

class TicketRepository extends BaseRepository
{
    public function __construct(Ticket $ticket)
    {
        $this->model = $ticket;
    }
}
