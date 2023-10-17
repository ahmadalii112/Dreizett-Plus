<?php

namespace App\Http\Repositories\ResidentialCommunity;

use App\Http\Repositories\BaseRepository;
use App\Models\ResidentialCommunity;

class ResidentialCommunityRepository extends BaseRepository
{
    public function __construct(ResidentialCommunity $residentialCommunity)
    {
        $this->model = $residentialCommunity;
    }
}
