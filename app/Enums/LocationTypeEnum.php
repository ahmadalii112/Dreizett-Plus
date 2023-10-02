<?php

namespace App\Enums;

enum LocationTypeEnum: string
{
    case WG_BERGE = 'WG Berge';
    case WG_GARTENSTRASSE = 'WG Gartenstraße';
    case WG_BRESLAUER_PLATZ = 'WG Breslauer Platz';
    case GEVELSBERG_DAY_CARE = 'Kindertagesstätte Gevelsberg';
    case GEVELSBERG_OFFICE = 'Büro Gevelsberg';
    case ENNEPETAL_OFFICE = 'Büro Ennepetal';
    case HASPE_OFFICE = 'Haspe-Büro';

}
