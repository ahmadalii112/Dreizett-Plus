<?php

namespace App\Enums;

enum TicketStatusEnum: string
{
    case OPEN = 'Offen';
    case IN_PROGRESS = 'In Arbeit';
    case COMPLETED = 'Erledigt';
}
