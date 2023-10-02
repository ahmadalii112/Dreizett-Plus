<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Http\Service\TicketService;
use App\Models\Ticket;
use Illuminate\Http\RedirectResponse;
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
    public function index(): View
    {
        $tickets = $this->ticketService->paginate(with: ['user']);

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

        return redirect()->route('tickets.index')->with('notificationType', 'success')->with('notificationMessage', 'Ticket Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket): View
    {
        $ticket->load(['user', 'notes']);

        return view('tickets.show', compact('ticket'));
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

        return redirect()->route('tickets.index')->with('notificationType', 'info')->with('notificationMessage', 'Ticket Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket): RedirectResponse
    {
        $this->ticketService->delete($ticket->id);

        return redirect()->route('tickets.index')->with('notificationType', 'info')->with('notificationMessage', 'Ticket Deleted Successfully');
    }
}
