<?php

namespace App\Http\Repositories\Transaction;

use App\Http\Repositories\BaseRepository;
use App\Models\Transaction;

class TransactionRepository extends BaseRepository
{
    public function __construct(Transaction $transaction)
    {
        $this->model = $transaction;
    }
}
