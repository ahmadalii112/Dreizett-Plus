<?php

namespace App\Http\Service;

use App\Http\Repositories\RoomRepository;

class RoomService extends BaseService
{
    public function __construct(RoomRepository $roomRepository)
    {
        $this->repository = $roomRepository;
    }
}
