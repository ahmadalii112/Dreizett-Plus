<?php

namespace App\Http\Repositories;

use App\Models\ResidentialCommunity;

class ResidentialCommunityRepository extends BaseRepository
{
    public function __construct(ResidentialCommunity $residentialCommunity)
    {
        $this->model = $residentialCommunity;
    }
}
