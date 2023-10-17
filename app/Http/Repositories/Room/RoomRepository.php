<?php

namespace App\Http\Repositories\Room;

use App\Http\Repositories\BaseRepository;
use App\Models\Room;

class RoomRepository extends BaseRepository
{
    public function __construct(Room $room)
    {
        $this->model = $room;
    }
}
