<?php

namespace App\Http\Service\Room;

use App\Http\Repositories\Room\RoomRepository;
use App\Http\Service\BaseService;

class RoomService extends BaseService
{
    public function __construct(RoomRepository $roomRepository)
    {
        $this->repository = $roomRepository;
    }
}
