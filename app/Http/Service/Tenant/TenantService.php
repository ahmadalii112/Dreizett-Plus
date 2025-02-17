<?php

namespace App\Http\Service\Tenant;

use App\Http\Repositories\Tenant\TenantRepository;
use App\Http\Service\BaseService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class TenantService extends BaseService
{
    public function __construct(TenantRepository $tenantRepository)
    {
        $this->repository = $tenantRepository;
    }

    public function createTenantWithAuthRepresentative(array $tenantData, $authorizedRepresentative): Model
    {
        $tenant = $this->create([
            'level_of_care' => $tenantData['level_of_care'] ?? null,
            'room_id' => $tenantData['room_id'] ?? null,
            'insurance_number' => $tenantData['insurance_number'] ?? null,
            'contract_start_date' => $tenantData['contract_start_date'] ?? null,
            'contract_end_date' => $tenantData['contract_end_date'] ?? null,
            'status' => $tenantData['status'] ?? null,
        ]);
        $tenant->information()->create($this->commonFields($tenantData));
        if ($authorizedRepresentative) {
            $filteredAuthorizedRep = array_filter($authorizedRepresentative['authorized_representative']);
            if (! empty($filteredAuthorizedRep)) {
                $representative = $tenant->authorizedRepresentative()->create([
                    'phone_number' => $filteredAuthorizedRep['phone_number'] ?? null,
                    'mobile_number' => $filteredAuthorizedRep['mobile_number'] ?? null,
                    'email' => $filteredAuthorizedRep['email'] ?? null,
                ]);
                $representative->information()->create($this->commonFields($filteredAuthorizedRep));
            }
        }

        return $tenant;
    }

    public function updateTenant($tenant, $request)
    {
        // Update tenant information
        $this->update(
            where: ['id' => $tenant->id],
            data: ['level_of_care' => $request->level_of_care, 'room_id' => $request->room_id, 'contract_start_date' => $request->contract_start_date, 'contract_end_date' => $request->contract_end_date,  'insurance_number' => $request->insurance_number]
        );
        $tenant->information()->updateOrCreate(['informationable_id' => $tenant->id], $request->only('first_name', 'last_name', 'salutation', 'house_number', 'street', 'zip_code', 'city'));
        // Update  tenant Authorization Representative Information
        $authorizedRepresentative = $request->only('authorized_representative.email', 'authorized_representative.mobile_number', 'authorized_representative.phone_number');
        $tenant->authorizedRepresentative()->updateOrCreate(['tenant_id' => $tenant->id], reset($authorizedRepresentative));
        $authorizeInformation = $request->only('authorized_representative.first_name', 'authorized_representative.last_name', 'authorized_representative.salutation', 'authorized_representative.house_number', 'authorized_representative.street', 'authorized_representative.zip_code', 'authorized_representative.city');
        $tenant->authorizedRepresentative->information()->updateOrCreate(['informationable_id' => $tenant->authorizedRepresentative->id], reset($authorizeInformation));
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

    public function generateContractPDF($tenant): void
    {
        // Check if the directory exists, and if not, create it
        $directory = storage_path('app/public/contracts');
        if (! file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $name = Str::slug($tenant?->information?->full_name, '-');
        $pdf = PDF::loadView('tenants.contract-pdf', ['tenant' => $tenant]);
        $contractPdfPath = 'contracts/'.$name.'_contract.pdf';
        $pdf->save(storage_path('app/public/'.$contractPdfPath));
        $url = asset('storage/'.$contractPdfPath);
        $tenant->tenantContract()->updateOrcreate(['tenant_id' => $tenant->id], ['contract_pdf_path' => $url]);
    }

    public function commonFields(array $data): array
    {
        return [
            'first_name' => $data['first_name'] ?? null,
            'last_name' => $data['last_name'] ?? null,
            'salutation' => $data['salutation'] ?? null,
            'house_number' => $data['house_number'] ?? null,
            'street' => $data['street'] ?? null,
            'zip_code' => $data['zip_code'] ?? null,
            'city' => $data['city'] ?? null,
        ];
    }

    public function getDatatables($roomId)
    {
        $data = (is_null($roomId))
            ? $this->select(with: ['room', 'information'], where: ['status' => '1'])
            : $this->select(with: ['room', 'information'], where: ['status' => '0', 'room_id' => $roomId]);

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('full_name', fn ($row) => $row?->information?->full_name ?? 'N/A')
            ->addColumn('room_number', fn ($row) => $row?->room?->room_number ?? 'N/A')
            ->addColumn('address',
                fn ($row) => Str::limit($row?->information?->address, 25))
            ->addColumn('status', function ($tenant) {
                $status = ($tenant->status == 1) ? 'green' : 'red';

                return "<span class='inline-flex items-center text-center rounded-md bg-{$status}-50 px-2 py-1 text-xs font-medium text-{$status}-600 ring-1 ring-inset ring-{$status}-500/10/20'> $tenant?->tenant_status </span>";
            })
            ->addColumn('contract_start', fn ($row) => $row?->contract_start ?? 'N/A')
            ->addColumn('contract_end', fn ($row) => $row?->contract_end ?? 'N/A')

            ->addColumn('action', fn ($tenant) => \view('tenants.partials.table-action', compact('tenant'))->render())
            ->filterColumn('full_name', function ($query, $keyword) {
                $query->withWhereHas('information', function ($subQuery) use ($keyword) {
                    $subQuery->whereRaw("CONCAT(salutation, ' ', first_name, ' ', last_name) LIKE ?", ["%$keyword%"]);
                });
            })
            ->rawColumns(['action', 'status'])
            ->make(true);

    }
}
