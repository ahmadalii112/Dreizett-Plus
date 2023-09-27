<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenantRequest;
use App\Http\Service\AuthorizedRepresentativeService;
use App\Http\Service\RoomService;
use App\Http\Service\TenantService;
use App\Models\Tenant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TenantController extends Controller
{
    protected TenantService $tenantService;

    protected RoomService $roomService;

    protected AuthorizedRepresentativeService $authorizedRepresentativeService;

    public function __construct(
        TenantService $tenantService,
        RoomService $roomService,
        AuthorizedRepresentativeService $authorizedRepresentativeService
    ) {
        $this->tenantService = $tenantService;
        $this->roomService = $roomService;
        $this->authorizedRepresentativeService = $authorizedRepresentativeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tenants = $this->tenantService->paginate(with: ['room']);
        $rooms = $this->roomService->all()->isEmpty();

        return view('tenants.index', compact('tenants', 'rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|RedirectResponse
    {
        $rooms = $this->roomService->all();

        return $rooms->isNotEmpty()
            ? view('tenants.create-edit-form', compact('rooms'))
            : redirect()->route('tenants.index')->with('notificationType', 'warning')->with('notificationMessage', 'Please create rooms first');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TenantRequest $request): RedirectResponse
    {
        $this->tenantService->createTenantWithAuthRepresentative(
            tenantData: $request->except('authorized_representative.email', 'authorized_representative.mobile_number', 'authorized_representative.phone_number'),
            authorizedRepresentative: $request->only('authorized_representative.email', 'authorized_representative.mobile_number', 'authorized_representative.phone_number')
        );

        return redirect()->route('tenants.index')->with('notificationType', 'success')->with('notificationMessage', 'Tenant Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        // show page
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant): View
    {
        $rooms = $this->roomService->all();

        return view('tenants.create-edit-form', compact('rooms', 'tenant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TenantRequest $request, Tenant $tenant): RedirectResponse
    {
        $this->tenantService->update(where: ['id' => $tenant->id], data: $request->except('authorized_representative.email', 'authorized_representative.mobile_number', 'authorized_representative.phone_number'));
        $authorizedRepresentative = $request->only('authorized_representative.email', 'authorized_representative.mobile_number', 'authorized_representative.phone_number');
        $this->authorizedRepresentativeService->updateOrCreate(
            where: ['tenant_id' => $tenant->id],
            data: reset($authorizedRepresentative)
        );

        return redirect()->route('tenants.index')->with('notificationType', 'info')->with('notificationMessage', 'Tenant Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant): RedirectResponse
    {
        $this->tenantService->delete($tenant->id);

        return redirect()->route('tenants.index')->with('notificationType', 'info')->with('notificationMessage', 'Tenant Deleted Successfully');
    }
}
