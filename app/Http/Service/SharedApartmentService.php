<?php

namespace App\Http\Service;

use App\Http\Repositories\SharedApartmentRepository;

class SharedApartmentService extends BaseService
{
    public function __construct(SharedApartmentRepository $sharedApartmentRepository)
    {
        $this->repository = $sharedApartmentRepository;
    }
}
