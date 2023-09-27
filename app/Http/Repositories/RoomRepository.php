<?php

namespace App\Http\Repositories;

use App\Models\Room;

class RoomRepository extends BaseRepository
{
    public function __construct(Room $room)
    {
        $this->model = $room;
    }
}
