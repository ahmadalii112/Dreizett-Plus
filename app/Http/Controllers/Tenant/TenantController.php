<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\TenantRequest;
use App\Http\Service\AuthorizedRepresentativeService;
use App\Http\Service\Room\RoomService;
use App\Http\Service\Tenant\TenantService;
use App\Models\Tenant;
use DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
    public function index(Request $request, $roomId = null): View|JsonResponse
    {
        $rooms = $this->roomService->all()->isEmpty();

        return ($request->ajax())
            ? $this->tenantService->getDatatables($roomId)
            : view('tenants.index', compact('rooms', 'roomId'));
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
        try {
            DB::beginTransaction();
            $this->tenantService->updateTenantStatusForRoom($request->input('room_id'));
            $tenant = $this->tenantService->createTenantWithAuthRepresentative(
                tenantData: $request->except('authorized_representative'),
                authorizedRepresentative: $request->only('authorized_representative'),
            );
            $this->tenantService->generateContractPDF($tenant);

            DB::commit();

            return redirect()->route('tenants.index')
                ->with('notificationType', 'success')
                ->with('notificationMessage', trans('language.notifications.add', ['Name' => trans_choice('language.tenants.tenants', 2)]));
        } catch (\Exception $exception) {
            DB::rollBack();

            return redirect()->route('tenants.index')
                ->with('notificationType', 'danger')
                ->with('notificationMessage', $exception->getMessage());
        }

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
        try {
            DB::beginTransaction();
            $this->tenantService->updateTenant($tenant, $request);
            $this->tenantService->generateContractPDF($tenant);
            DB::commit();

            return redirect()->route('tenants.index')
                ->with('notificationType', 'info')
                ->with('notificationMessage', trans('language.notifications.update', ['Name' => trans_choice('language.tenants.tenants', 2)]));
        } catch (\Exception $exception) {
            DB::rollBack();

            return redirect()->route('tenants.index')
                ->with('notificationType', 'danger')
                ->with('notificationMessage', $exception->getMessage());
        }
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
