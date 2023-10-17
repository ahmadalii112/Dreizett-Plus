<?php

namespace App\Http\Service\Room;

use App\Http\Repositories\Room\RoomRepository;
use App\Http\Service\BaseService;
use Yajra\DataTables\DataTables;

class RoomService extends BaseService
{
    public function __construct(RoomRepository $roomRepository)
    {
        $this->repository = $roomRepository;
    }

    public function getDatatables($data)
    {
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('community_id', fn ($row) => $row?->residentialCommunity?->name ?? 'N/A')
            ->addColumn('created_by', fn ($row) => $row?->user->full_name ?? 'N/A')
            ->addColumn('action', fn ($room) => \view('rooms.partials.table-action', compact('room'))->render())
            ->make(true);
    }
}
