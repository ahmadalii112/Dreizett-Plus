<?php

namespace App\Http\Controllers;

use App\Http\Requests\SharedApartmentRequest;
use App\Http\Service\ResidentialCommunity\ResidentialCommunityService;
use App\Http\Service\SharedApartmentService;
use App\Models\SharedApartment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SharedApartmentController extends Controller
{
    protected SharedApartmentService $sharedApartmentService;

    protected ResidentialCommunityService $residentialCommunityService;

    public function __construct(SharedApartmentService $sharedApartmentService, ResidentialCommunityService $residentialCommunityService)
    {
        $this->sharedApartmentService = $sharedApartmentService;
        $this->residentialCommunityService = $residentialCommunityService;
    }

    public function index(): View
    {
        $sharedApartments = $this->sharedApartmentService->paginate(with: ['residentialCommunity', 'rooms']);
        $residentialCommunity = $this->residentialCommunityService->all()->isEmpty();

        return view('shared-apartments.index', compact('sharedApartments', 'residentialCommunity'));
    }

    public function create(): View|RedirectResponse
    {
        $residentialCommunities = $this->residentialCommunityService->all();

        return $residentialCommunities->isNotEmpty()
            ? view('shared-apartments.create-edit-form', compact('residentialCommunities'))
            : redirect()->route('shared-apartments.index')
                ->with('notificationType', 'warning')
                ->with('notificationMessage', trans('language.notifications.not_available', ['name' => trans_choice('language.residential_community.community', 1)]));

    }

    public function store(SharedApartmentRequest $request)
    {
        $this->sharedApartmentService->create(data: $request->validated());

        return redirect()->route('shared-apartments.index')
            ->with('notificationType', 'success')
            ->with('notificationMessage', trans('language.notifications.add', ['Name' => trans_choice('language.shared_apartments.apartments|apartment', 2)]));
    }

    public function show($id)
    {
    }

    public function edit(SharedApartment $sharedApartment): View
    {
        $residentialCommunities = $this->residentialCommunityService->all();

        return view('shared-apartments.create-edit-form', compact('residentialCommunities', 'sharedApartment'));

    }

    public function update(SharedApartmentRequest $request, SharedApartment $sharedApartment)
    {
        $this->sharedApartmentService->update(where: ['id' => $sharedApartment->id], data: $request->validated());

        return redirect()->route('shared-apartments.index')
            ->with('notificationType', 'info')
            ->with('notificationMessage', trans('language.notifications.update', ['Name' => trans_choice('language.shared_apartments.apartments|apartment', 2)]));
    }

    public function destroy(SharedApartment $sharedApartment)
    {
        $this->sharedApartmentService->delete($sharedApartment->id);

        return redirect()->route('shared-apartments.index')
            ->with('notificationType', 'info')
            ->with('notificationMessage', trans('language.notifications.delete', ['Name' => trans_choice('language.shared_apartments.apartments|apartment', 2)]));
    }
}
