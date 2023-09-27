<?php

namespace App\Http\Service;

use App\Http\Repositories\AuthorizedRepresentativeRepository;

class AuthorizedRepresentativeService extends BaseService
{
    public function __construct(AuthorizedRepresentativeRepository $authorizedRepresentativeRepository)
    {
        $this->repository = $authorizedRepresentativeRepository;
    }
}
