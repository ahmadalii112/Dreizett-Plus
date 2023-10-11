<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Http\Service\ResidentialCommunityService;
use App\Http\Service\RoomService;
use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RoomController extends Controller
{
    protected RoomService $roomService;

    protected ResidentialCommunityService $residentialCommunityService;

    public function __construct(RoomService $roomService, ResidentialCommunityService $residentialCommunityService)
    {
        $this->roomService = $roomService;
        $this->residentialCommunityService = $residentialCommunityService;
    }

    public function index(): View
    {
        $rooms = $this->roomService->paginate(with: ['residentialCommunity']);
        $residentialCommunities = $this->residentialCommunityService->all()->isEmpty();

        return view('rooms.index', compact('rooms', 'residentialCommunities'));
    }

    public function create(): View|RedirectResponse
    {
        $residentialCommunities = $this->residentialCommunityService->all();

        return $residentialCommunities->isNotEmpty()
            ? view('rooms.create-edit-form', compact('residentialCommunities'))
            : redirect()->route('rooms.index')
                ->with('notificationType', 'warning')
                ->with('notificationMessage', trans('language.notifications.not_available', ['name' => trans_choice('language.residential_community.community', 1)]));

    }

    public function store(RoomRequest $request): RedirectResponse
    {
        $this->roomService->create(data: $request->validated() + ['created_by' => auth()->id()]);

        return redirect()->route('rooms.index')
            ->with('notificationType', 'success')
            ->with('notificationMessage', trans('language.notifications.add', ['Name' => trans_choice('language.rooms.rooms', 2)]));
    }

    public function show(Room $room): View
    {
        $room->load(['residentialCommunity']);

        return view('rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        $residentialCommunities = $this->residentialCommunityService->all();

        return view('rooms.create-edit-form', compact('residentialCommunities', 'room'));
    }

    public function update(RoomRequest $request, Room $room): RedirectResponse
    {
        $this->roomService->update(where: ['id' => $room->id], data: $request->validated());

        return redirect()->route('rooms.index')
            ->with('notificationType', 'info')
            ->with('notificationMessage', trans('language.notifications.update', ['Name' => trans_choice('language.rooms.rooms', 2)]));
    }

    public function destroy(Room $room): RedirectResponse
    {
        $this->roomService->delete($room->id);

        return redirect()->route('rooms.index')
            ->with('notificationType', 'info')
            ->with('notificationMessage', trans('language.notifications.delete', ['Name' => trans_choice('language.rooms.rooms', 2)]));
    }
}
