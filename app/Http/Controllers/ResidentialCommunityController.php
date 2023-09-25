<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResidentialCommunityRequest;
use App\Http\Service\ResidentialCommunityService;
use App\Models\ResidentialCommunity;
use Illuminate\Contracts\View\View;

class ResidentialCommunityController extends Controller
{
    protected ResidentialCommunityService $residentialCommunityService;

    public function __construct(ResidentialCommunityService $residentialCommunityService)
    {
        $this->residentialCommunityService = $residentialCommunityService;
    }

    public function index(): View
    {
        $residentialCommunities = $this->residentialCommunityService->paginate(perPage: 10, with: ['user']);

        return view('residential-communities.index', compact('residentialCommunities'));
    }

    public function create(): View
    {
        return view('residential-communities.create-edit-form');
    }

    public function store(ResidentialCommunityRequest $request)
    {
        $this->residentialCommunityService->create(data: $request->validated() + ['created_by' => auth()->id()]);

        return redirect()->route('residential-communities.index');

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

        return redirect()->route('residential-communities.index');

    }

    public function destroy(ResidentialCommunity $residentialCommunity)
    {
        $this->residentialCommunityService->delete($residentialCommunity->id);

        return redirect()->route('residential-communities.index');
    }
}
