<?php

namespace App\Http\Repositories\Connection;

use App\Http\Repositories\BaseRepository;
use App\Models\Connection;

class ConnectionRepository extends BaseRepository
{
    public function __construct(Connection $connection)
    {
        $this->model = $connection;
    }
}
