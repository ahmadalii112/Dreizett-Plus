<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenantRequest;
use App\Http\Service\AuthorizedRepresentativeService;
use App\Http\Service\Room\RoomService;
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
    public function index($roomId = null): View
    {
        $tenants = (is_null($roomId))
            ? $this->tenantService->paginate(with: ['room'], where: ['status' => '1'])
            : $this->tenantService->paginate(with: ['room'], where: ['status' => '0', 'room_id' => $roomId]);
        $rooms = $this->roomService->all()->isEmpty();

        return view('tenants.index', compact('tenants', 'rooms', 'roomId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|RedirectResponse
    {
        $rooms = $this->roomService->all();

        return $rooms->isNotEmpty()
            ? view('tenants.create-edit-form', compact('rooms'))
            : redirect()->route('tenants.index')
                ->with('notificationType', 'warning')
                ->with('notificationMessage', trans('language.notifications.not_available', ['name' => trans_choice('language.rooms.rooms', 1)]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TenantRequest $request): RedirectResponse
    {
        // Check if there's a previous tenant in the room and update their status
        $this->tenantService->updateTenantStatusForRoom($request->input('room_id'));
        $tenant = $this->tenantService->createTenantWithAuthRepresentative(
            tenantData: $request->except('authorized_representative'),
            authorizedRepresentative: $request->only('authorized_representative'),
        );
        $this->tenantService->generateContractPDF($tenant);

        return redirect()->route('tenants.index')
            ->with('notificationType', 'success')
            ->with('notificationMessage', trans('language.notifications.add', ['Name' => trans_choice('language.tenants.tenants', 2)]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant): View
    {
        $tenant->load(['room', 'authorizedRepresentative.information', 'information']);

        return view('tenants.show', compact('tenant'));
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
        $this->tenantService->updateTenant($tenant, $request);

        return redirect()->route('tenants.index')
            ->with('notificationType', 'info')
            ->with('notificationMessage', trans('language.notifications.update', ['Name' => trans_choice('language.tenants.tenants', 2)]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant): RedirectResponse
    {
        $this->tenantService->delete($tenant->id);
        $tenant->information->delete();

        return redirect()->route('tenants.index')
            ->with('notificationType', 'info')
            ->with('notificationMessage', trans('language.notifications.delete', ['Name' => trans_choice('language.tenants.tenants', 2)]));
    }
}
