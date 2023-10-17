<?php

namespace App\Http\Service\Ticket;

use App\Enums\RoleTypeEnum;
use App\Enums\TicketTypeEnum;
use App\Http\Repositories\Ticket\TicketRepository;
use App\Http\Service\BaseService;
use Yajra\DataTables\DataTables;

class TicketService extends BaseService
{
    public function __construct(TicketRepository $ticketRepository)
    {
        $this->repository = $ticketRepository;
    }

    public function getTicketsByUserRole($user)
    {
        return match (true) {
            $user->hasRole(RoleTypeEnum::TECHNICIAN->value) => $this->select(with: ['user'], where: ['ticket_type' => TicketTypeEnum::REPORT->value]),
            $user->hasRole(RoleTypeEnum::CAREGIVER->value) => $this->select(with: ['user'], where: ['user_id' => $user->id]),
            default => $this->select(with: ['user']),
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

    public function getDatatables($data)
    {
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('user_id', fn ($row) => $row?->user->full_name ?? 'N/A')
            ->addColumn('action', fn ($ticket) => \view('tickets.partials.table-action', compact('ticket'))->render())
            ->make(true);
        //user_id
        //location
        //ticket_type
        //ticket_status
    }
}
