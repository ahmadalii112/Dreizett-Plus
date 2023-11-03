<?php

namespace App\Http\Service\Connection;

use App\Http\Repositories\Connection\ConnectionRepository;
use App\Http\Service\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ConnectionService extends BaseService
{
    public function __construct(ConnectionRepository $connectionRepository)
    {
        $this->repository = $connectionRepository;
    }

    public function createConnection($data)
    {
        return $this->create([
            'uuid' => Str::uuid(),
            'external_id' => $data['id'],
            'secret_identifier' => 'Hash',
            'start_date' => now()->format('Y-m-d'),
            'status' => $data['status'],
            'type' => $data['type'],
            'bank_connection_id' => null,
        ]);
    }

    public function updateBankConnection($webFormId, $webFomStatus): ?Model
    {
        $this->update(
            where: ['external_id' => $webFormId],
            data: [
                'status' => $webFomStatus['status'],
                'bank_connection_id' => $webFomStatus['payload']['bankConnectionId'],

            ]
        );

        return $this->first(where: ['external_id' => $webFormId]);

    }
}
