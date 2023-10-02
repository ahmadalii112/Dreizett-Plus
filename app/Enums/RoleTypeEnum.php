<?php

namespace App\Enums;

enum RoleTypeEnum: string
{
    case ADMINISTRATION = 'Verwaltung';
    case CAREGIVER = 'Pflegekraft';
    case MANAGEMENT = 'Leitung';
    case TECHNICIAN = 'Techniker';

}
