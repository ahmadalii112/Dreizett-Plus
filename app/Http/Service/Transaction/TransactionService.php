<?php

namespace App\Http\Service\Transaction;

use App\Http\Repositories\Transaction\TransactionRepository;
use App\Http\Service\BaseService;

class TransactionService extends BaseService
{
    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->repository = $transactionRepository;
    }
}
