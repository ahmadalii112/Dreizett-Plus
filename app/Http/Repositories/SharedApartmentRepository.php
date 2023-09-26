<?php

namespace App\Http\Repositories;

use App\Models\SharedApartment;

class SharedApartmentRepository extends BaseRepository
{
    public function __construct(SharedApartment $sharedApartment)
    {
        $this->model = $sharedApartment;
    }
}
