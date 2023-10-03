<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function exportPdf(Ticket $ticket)
    {
        $pdf = Pdf::loadView('tickets.pdf', [
            'ticket' => $ticket->load(['user']),
            'notes' => $ticket->notes()->get(),
        ]);

        return $pdf->download('ticket.pdf');
    }
}
