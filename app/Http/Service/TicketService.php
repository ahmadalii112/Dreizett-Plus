<?php

namespace App\Http\Service;

use App\Http\Repositories\TicketRepository;

class TicketService extends BaseService
{
    public function __construct(TicketRepository $ticketRepository)
    {
        $this->repository = $ticketRepository;
    }
}
