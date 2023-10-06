<?php

use App\Enums\LocationTypeEnum;
use App\Enums\RoleTypeEnum;
use App\Enums\TicketStatusEnum;
use App\Enums\TicketTypeEnum;
use App\Enums\TradeTypeEnum;

return [
    'roles' => [
        RoleTypeEnum::ADMINISTRATION->value => 'Verwaltung',
        RoleTypeEnum::CAREGIVER->value => 'Pflegekraft',
        RoleTypeEnum::MANAGEMENT->value => 'Leitung',
        RoleTypeEnum::TECHNICIAN->value => 'Techniker',
        '' => 'N / A',
    ],
    'ticket_statuses' => [
        TicketStatusEnum::OPEN->value => 'Offen',
        TicketStatusEnum::IN_PROGRESS->value => 'In Arbeit',
        TicketStatusEnum::COMPLETED->value => 'Erledigt',
        '' => 'N / A',
    ],
    'location_type' => [
        LocationTypeEnum::WG_BERGE->value => 'WG Berge',
        LocationTypeEnum::WG_GARTENSTRASSE->value => 'WG Gartenstraße',
        LocationTypeEnum::WG_BRESLAUER_PLATZ->value => 'WG Breslauer Platz',
        LocationTypeEnum::GEVELSBERG_DAY_CARE->value => 'Kindertagesstätte Gevelsberg',
        LocationTypeEnum::GEVELSBERG_OFFICE->value => 'Büro Gevelsberg',
        LocationTypeEnum::ENNEPETAL_OFFICE->value => 'Büro Ennepetal',
        LocationTypeEnum::HASPE_OFFICE->value => 'Haspe-Büro',
        '' => 'N / A',
    ],
    'ticket_type' => [
        TicketTypeEnum::ORDER_REQUEST->value => 'Bestellwunsch',
        TicketTypeEnum::SUGGESTION->value => 'Verbesserungsvorschlag / Kritik',
        TicketTypeEnum::REPORT->value => 'Technische Störung / Mangel melden',
        TicketTypeEnum::REIMBURSEMENT->value => 'Auslagenerstattung',
        '' => 'N / A',
    ],
    'trade_type' => [
        TradeTypeEnum::GAS_WATER->value => 'Gas-Wasse',
        TradeTypeEnum::ELECTRICAL->value => 'Elektro',
        TradeTypeEnum::DOORS->value => 'Türen/Fenster',
        TradeTypeEnum::ASSEMBLY->value => 'Montage',
        TradeTypeEnum::OTHER->value => 'Sonstiges',
        '' => 'N / A',
    ],

];
