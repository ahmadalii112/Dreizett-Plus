<?php

namespace App\Http\Service\Role;

use App\Http\Repositories\Role\RoleRepository;
use App\Http\Service\BaseService;

class RoleService extends BaseService
{
    public function __construct(RoleRepository $roleRepository)
    {
        $this->repository = $roleRepository;
    }
}
