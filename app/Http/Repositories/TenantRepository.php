<?php

namespace App\Http\Repositories;

use App\Models\Tenant;

class TenantRepository extends BaseRepository
{
    public function __construct(Tenant $tenant)
    {
        $this->model = $tenant;
    }
}
