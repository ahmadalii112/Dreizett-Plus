<?php

namespace App\Http\Service;

use App\Http\Repositories\TenantRepository;
use App\Models\Tenant;

class TenantService extends BaseService
{
    public function __construct(TenantRepository $tenantRepository)
    {
        $this->repository = $tenantRepository;
    }

    public function createTenantWithAuthRepresentative(array $tenantData, $authorizedRepresentative): Tenant
    {
        $tenant = $this->create($tenantData);
        if ($authorizedRepresentative) {
            $filteredAuthorizedRep = array_filter($authorizedRepresentative['authorized_representative']);
            if (! empty($filteredAuthorizedRep)) {
                $tenant->authorizedRepresentative()->create($filteredAuthorizedRep);
            }
        }

        return $tenant;
    }
}
