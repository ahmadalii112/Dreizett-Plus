<?php

namespace App\Http\Service;

use App\Enums\RoleTypeEnum;
use App\Enums\TicketTypeEnum;
use App\Http\Repositories\TicketRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class TicketService extends BaseService
{
    public function __construct(TicketRepository $ticketRepository)
    {
        $this->repository = $ticketRepository;
    }

    public function getTicketsByUserRole($user): LengthAwarePaginator
    {
        return match (true) {
            $user->hasRole(RoleTypeEnum::TECHNICIAN->value) => $this->paginate(with: ['user'], where: ['ticket_type' => TicketTypeEnum::REPORT->value]),
            $user->hasRole(RoleTypeEnum::CAREGIVER->value) => $this->paginate(with: ['user'], where: ['user_id' => $user->id]),
            default => $this->paginate(with: ['user']),
        };
    }

    public function showTicketsByUserRole($user, $ticket): void
    {
        if (
            ($user->hasRole(RoleTypeEnum::CAREGIVER->value) && $user->id !== $ticket->user_id) ||
            ($user->hasRole(RoleTypeEnum::TECHNICIAN->value) && $ticket->ticket_type->value !== TicketTypeEnum::REPORT->value)
        ) {
            // Caregivers can only view their own tickets, and Technicians can only view technical tickets.
            abort(403, 'Unauthorized');
        }
    }
}
