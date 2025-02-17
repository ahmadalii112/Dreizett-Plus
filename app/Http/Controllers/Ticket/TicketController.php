<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
use App\Http\Service\Ticket\TicketService;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TicketController extends Controller
{
    protected TicketService $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|JsonResponse
    {
        $user = Auth::user();
        $tickets = $this->ticketService->getTicketsByUserRole($user);
        if ($request->ajax()) {
            return $this->ticketService->getDatatables($tickets);
        }

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|RedirectResponse
    {
        return view('tickets.create-edit-form');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketRequest $request): RedirectResponse
    {
        $this->ticketService->create(data: $request->validated() + ['user_id' => auth()->id()]);

        return redirect()->route('tickets.index')
            ->with('notificationType', 'success')
            ->with('notificationMessage', trans('language.notifications.add', ['Name' => trans_choice('language.tickets.tickets', 2)]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket): View
    {
        $user = Auth::user();
        $this->ticketService->showTicketsByUserRole($user, $ticket);

        return view('tickets.show', [
            'ticket' => $ticket->load(['user']),
            'notes' => $ticket->notes()->latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket): View
    {
        return view('tickets.create-edit-form', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketRequest $request, Ticket $ticket): RedirectResponse
    {
        $this->ticketService->update(where: ['id' => $ticket->id], data: $request->validated());

        return redirect()->route('tickets.index')
            ->with('notificationType', 'info')
            ->with('notificationMessage', trans('language.notifications.update', ['Name' => trans_choice('language.tickets.tickets', 2)]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket): RedirectResponse
    {
        $this->ticketService->delete($ticket->id);

        return redirect()->route('tickets.index')
            ->with('notificationType', 'info')
            ->with('notificationMessage', trans('language.notifications.delete', ['Name' => trans_choice('language.tickets.tickets', 2)]));
    }
}
