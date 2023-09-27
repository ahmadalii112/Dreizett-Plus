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
            : redirect()->route('rooms.index')->with('notificationType', 'warning')->with('notificationMessage', 'Please create apartments first');

    }

    public function store(RoomRequest $request): RedirectResponse
    {
        $this->roomService->create(data: $request->validated());

        return redirect()->route('rooms.index')->with('notificationType', 'success')->with('notificationMessage', 'Room Created Successfully');
    }

    public function show(Room $room)
    {
    }

    public function edit(Room $room)
    {
        $sharedApartments = $this->sharedApartmentService->all();

        return view('rooms.create-edit-form', compact('sharedApartments', 'room'));
    }

    public function update(RoomRequest $request, Room $room): RedirectResponse
    {
        $this->roomService->update(where: ['id' => $room->id], data: $request->validated());

        return redirect()->route('rooms.index')->with('notificationType', 'info')->with('notificationMessage', 'Room Updated Successfully');
    }

    public function destroy(Room $room): RedirectResponse
    {
        $this->roomService->delete($room->id);

        return redirect()->route('rooms.index')->with('notificationType', 'info')->with('notificationMessage', 'Room Deleted Successfully');
    }
}
