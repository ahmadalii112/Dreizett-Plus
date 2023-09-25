<?php

namespace App\Http\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository
{
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    /**
     * Pluck roles with specified columns.
     */
    public function pluckRoles(string $valueColumn = 'name', string $keyColumn = 'key'): array
    {
        return $this->model->pluck($valueColumn, $keyColumn)->toArray();
    }
}
