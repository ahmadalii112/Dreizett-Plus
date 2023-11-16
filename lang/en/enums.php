<?php

use App\Enums\ConnectionStatusEnum;
use App\Enums\LocationTypeEnum;
use App\Enums\RoleTypeEnum;
use App\Enums\TicketStatusEnum;
use App\Enums\TicketTypeEnum;
use App\Enums\TradeTypeEnum;

return [

    'roles' => [
        RoleTypeEnum::ADMINISTRATION->value => 'Administrator',
        RoleTypeEnum::CAREGIVER->value => 'Caregiver',
        RoleTypeEnum::MANAGEMENT->value => 'Management',
        RoleTypeEnum::TECHNICIAN->value => 'Technician',
        '' => 'N / A',
    ],
    'ticket_statuses' => [
        TicketStatusEnum::OPEN->value => 'Open',
        TicketStatusEnum::IN_PROGRESS->value => 'In Progress',
        TicketStatusEnum::COMPLETED->value => 'Completed',
        '' => 'N / A',

    ],
    'location_type' => [
        LocationTypeEnum::WG_BERGE->value => 'WG Mountains',
        LocationTypeEnum::WG_GARTENSTRASSE->value => 'WG Gartenstrasse',
        LocationTypeEnum::WG_BRESLAUER_PLATZ->value => 'WG Breslauer Platz',
        LocationTypeEnum::GEVELSBERG_DAY_CARE->value => 'Gevelsberg Day Care',
        LocationTypeEnum::GEVELSBERG_OFFICE->value => 'Gevelsberg Office',
        LocationTypeEnum::ENNEPETAL_OFFICE->value => 'Ennepetal Office',
        LocationTypeEnum::HASPE_OFFICE->value => 'Hasp Office',
        '' => 'N / A',
    ],
    'ticket_type' => [
        TicketTypeEnum::ORDER_REQUEST->value => 'Order request',
        TicketTypeEnum::SUGGESTION->value => 'Suggestion for improvement/criticism',
        TicketTypeEnum::REPORT->value => 'Report a technical malfunction/defect',
        TicketTypeEnum::REIMBURSEMENT->value => 'Reimbursement of expenses',
        '' => 'N / A',
    ],
    'trade_type' => [
        TradeTypeEnum::GAS_WATER->value => 'Gas water',
        TradeTypeEnum::ELECTRICAL->value => 'Electrical',
        TradeTypeEnum::DOORS->value => 'Doors/Windows',
        TradeTypeEnum::ASSEMBLY->value => 'Assembly',
        TradeTypeEnum::OTHER->value => 'Other',
        '' => 'N / A',
    ],
    'connection_status' => [
        ConnectionStatusEnum::NOT_YET_OPENED->value => 'NOT_YET_OPENED',
        ConnectionStatusEnum::IN_PROGRESS->value => 'IN_PROGRESS',
        ConnectionStatusEnum::COMPLETED->value => 'COMPLETED',
        ConnectionStatusEnum::COMPLETED_WITH_ERROR->value => 'COMPLETED_WITH_ERROR',
        ConnectionStatusEnum::ABORTED->value => 'ABORTED',
        ConnectionStatusEnum::EXPIRED->value => 'EXPIRED',
        '' => 'N / A',
    ],

];
