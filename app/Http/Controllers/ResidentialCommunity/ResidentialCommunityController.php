<?php

namespace App\Http\Controllers\ResidentialCommunity;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResidentialCommunityRequest;
use App\Http\Service\ResidentialCommunity\ResidentialCommunityService;
use App\Models\ResidentialCommunity;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ResidentialCommunityController extends Controller
{
    protected ResidentialCommunityService $residentialCommunityService;

    public function __construct(ResidentialCommunityService $residentialCommunityService)
    {
        $this->residentialCommunityService = $residentialCommunityService;
    }

    public function index(Request $request): View|JsonResponse
    {
        $residentialCommunities = $this->residentialCommunityService->select(with: ['user', 'rooms']);
        if ($request->ajax()) {
            return $this->residentialCommunityService->getDatatables($residentialCommunities);
        }

        return view('residential-communities.index');
    }

    public function create(): View
    {
        return view('residential-communities.create-edit-form');
    }

    public function store(ResidentialCommunityRequest $request)
    {
        $this->residentialCommunityService->create(data: $request->validated() + ['created_by' => auth()->id()]);

        return redirect()->route('residential-communities.index')
            ->with('notificationType', 'success')
            ->with('notificationMessage', trans('language.notifications.add', ['Name' => trans_choice('language.residential_community.community', 2)]));

    }

    public function show(ResidentialCommunity $residentialCommunity)
    {

    }

    public function edit(ResidentialCommunity $residentialCommunity): View
    {
        return view('residential-communities.create-edit-form', compact('residentialCommunity'));

    }

    public function update(ResidentialCommunityRequest $request, ResidentialCommunity $residentialCommunity)
    {
        $this->residentialCommunityService->update(where: ['id' => $residentialCommunity->id], data: $request->validated());

        return redirect()->route('residential-communities.index')
            ->with('notificationType', 'info')
            ->with('notificationMessage', trans('language.notifications.update', ['Name' => trans_choice('language.residential_community.community', 2)]));

    }

    public function destroy(ResidentialCommunity $residentialCommunity)
    {
        $this->residentialCommunityService->delete($residentialCommunity->id);

        return redirect()->route('residential-communities.index')
            ->with('notificationType', 'info')
            ->with('notificationMessage', trans('language.notifications.delete', ['Name' => trans_choice('language.residential_community.community', 2)]));
    }
}
