<?php

namespace App\Enums;

enum RoleTypeEnum: string
{
    case ADMINISTRATION = 'Administration';
    case CAREGIVER = 'Caregiver';
    case MANAGEMENT = 'Management';
    case TECHNICIAN = 'Technician';
}
