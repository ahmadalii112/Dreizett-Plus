<?php

namespace App\Http\Repositories\Tenant;

use App\Http\Repositories\BaseRepository;
use App\Models\Tenant;

class TenantRepository extends BaseRepository
{
    public function __construct(Tenant $tenant)
    {
        $this->model = $tenant;
    }
}
