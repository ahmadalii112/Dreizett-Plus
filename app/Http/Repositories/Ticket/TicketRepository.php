<?php

namespace App\Http\Repositories\Ticket;

use App\Http\Repositories\BaseRepository;
use App\Models\Ticket;

class TicketRepository extends BaseRepository
{
    public function __construct(Ticket $ticket)
    {
        $this->model = $ticket;
    }
}
