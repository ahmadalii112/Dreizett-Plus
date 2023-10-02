<?php

namespace App\Enums;

enum TradeTypeEnum: string
{
    case GAS_WATER = 'Gas-Wasse';
    case ELECTRICAL = 'Elektro';
    case DOORS = 'Türen/Fenster';
    case ASSEMBLY = 'Montage';
    case OTHER = 'Sonstiges';
}
