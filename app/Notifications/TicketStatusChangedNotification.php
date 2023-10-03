<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketStatusChangedNotification extends Notification
{
    public object $ticket;

    public string $note;

    public function __construct($ticket, $note)
    {
        $this->ticket = $ticket;
        $this->note = $note;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $ticket = $this->ticket;

        return (new MailMessage)
            ->subject('Ticket Status Change Notification')
            ->line('The status of your ticket has been changed.')
            ->line('New Status: '.$ticket->ticket_status->value)
            ->line('Note: '.$this->note)
            ->action('View Ticket', route('tickets.show', $ticket))
            ->line('Thank you for using our ticketing system!');
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
