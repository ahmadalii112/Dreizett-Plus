<?php

namespace App\Http\Service;

use App\Http\Repositories\TenantRepository;
use Illuminate\Database\Eloquent\Model;

class TenantService extends BaseService
{
    public function __construct(TenantRepository $tenantRepository)
    {
        $this->repository = $tenantRepository;
    }

    public function createTenantWithAuthRepresentative(array $tenantData, $authorizedRepresentative): Model
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

    public function updateTenantStatusForRoom($roomId): void
    {
        // Get the previous tenants in the room (status = 1)
        $previousTenants = $this->repository->get(where: ['room_id' => $roomId, 'status' => 1]);
        // Set the status to 0 for previous tenants
        foreach ($previousTenants as $previousTenant) {
            $previousTenant->update(['status' => 0]);
        }
    }
}
