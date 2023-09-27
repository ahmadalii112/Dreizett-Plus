<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Http\Service\RoomService;
use App\Http\Service\SharedApartmentService;
use App\Models\Room;

class RoomController extends Controller
{
    protected RoomService $roomService;

    protected SharedApartmentService $sharedApartmentService;

    public function __construct(RoomService $roomService, SharedApartmentService $sharedApartment)
    {
        $this->roomService = $roomService;
        $this->sharedApartmentService = $sharedApartment;
    }

    public function index()
    {
        $rooms = $this->roomService->paginate(with: ['apartment']);

        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        $sharedApartments = $this->sharedApartmentService->all();

        return $sharedApartments->isNotEmpty()
            ? view('rooms.create-edit-form', compact('sharedApartments'))
            : redirect()->route('rooms.index')->with('notificationType', 'warning')->with('notificationMessage', 'Please create apartments first');

    }

    public function store(RoomRequest $request)
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

    public function update(RoomRequest $request, Room $room)
    {
        $this->roomService->update(where: ['id' => $room->id], data: $request->validated());

        return redirect()->route('rooms.index')->with('notificationType', 'info')->with('notificationMessage', 'Room Updated Successfully');
    }

    public function destroy(Room $room)
    {
        $this->roomService->delete($room->id);

        return redirect()->route('rooms.index')->with('notificationType', 'info')->with('notificationMessage', 'Room Deleted Successfully');
    }
}
