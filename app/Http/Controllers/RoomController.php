<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Http\Service\RoomService;
use App\Http\Service\SharedApartmentService;
use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RoomController extends Controller
{
    protected RoomService $roomService;

    protected SharedApartmentService $sharedApartmentService;

    public function __construct(RoomService $roomService, SharedApartmentService $sharedApartment)
    {
        $this->roomService = $roomService;
        $this->sharedApartmentService = $sharedApartment;
    }

    public function index(): View
    {
        $rooms = $this->roomService->paginate(with: ['apartment']);
        $sharedApartments = $this->sharedApartmentService->all()->isEmpty();

        return view('rooms.index', compact('rooms', 'sharedApartments'));
    }

    public function create(): View|RedirectResponse
    {
        $sharedApartments = $this->sharedApartmentService->all();

        return $sharedApartments->isNotEmpty()
            ? view('rooms.create-edit-form', compact('sharedApartments'))
            : redirect()->route('rooms.index')
                ->with('notificationType', 'warning')
                ->with('notificationMessage', trans('language.notifications.not_available', ['name' => trans_choice('language.shared_apartments.apartments|apartment', 1)]));

    }

    public function store(RoomRequest $request): RedirectResponse
    {
        $this->roomService->create(data: $request->validated());

        return redirect()->route('rooms.index')
            ->with('notificationType', 'success')
            ->with('notificationMessage', trans('language.notifications.add', ['Name' => trans_choice('language.rooms.rooms', 2)]));
    }

    public function show(Room $room): View
    {
        $room->load(['apartment']);

        return view('rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        $sharedApartments = $this->sharedApartmentService->all();

        return view('rooms.create-edit-form', compact('sharedApartments', 'room'));
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
