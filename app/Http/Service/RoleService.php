<?php

namespace App\Http\Service;

use App\Http\Repositories\RoleRepository;

class RoleService extends BaseService
{
    public function __construct(RoleRepository $roleRepository)
    {
        $this->repository = $roleRepository;
    }

    /**
     * Get all roles and pluck them for select options.
     */
    public function pluckRoles(string $valueColumn = 'name', string $keyColumn = 'key'): array
    {
        return $this->repository->pluckRoles($valueColumn, $keyColumn);
    }
}
