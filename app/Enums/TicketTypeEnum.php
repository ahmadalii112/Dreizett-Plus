<?php

namespace App\Enums;

enum TicketTypeEnum: string
{
    case ORDER_REQUEST = 'Bestellwunsch';
    case SUGGESTION = 'Verbesserungsvorschlag / Kritik';
    case REPORT = 'Technische Störung / Mangel melden';
    case REIMBURSEMENT = 'Auslagenerstattung';

}
