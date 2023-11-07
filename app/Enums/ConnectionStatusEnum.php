<?php

namespace App\Enums;

enum ConnectionStatusEnum: string
{
    case NOT_YET_OPENED = 'NOT_YET_OPENED';
    case IN_PROGRESS = 'IN_PROGRESS';
    case COMPLETED = 'COMPLETED';
    case COMPLETED_WITH_ERROR = 'COMPLETED_WITH_ERROR';
    case ABORTED = 'ABORTED';
    case EXPIRED = 'EXPIRED';

}
