<?php

namespace App\Http\Service;

use App\Http\Repositories\ResidentialCommunityRepository;

class ResidentialCommunityService extends BaseService
{
    public function __construct(ResidentialCommunityRepository $residentialCommunityRepository)
    {
        $this->repository = $residentialCommunityRepository;
    }
}
