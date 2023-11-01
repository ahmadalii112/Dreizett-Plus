<?php

namespace App\Http\Repositories\Account;

use App\Http\Repositories\BaseRepository;
use App\Models\Account;

class AccountRepository extends BaseRepository
{
    public function __construct(Account $account)
    {
        $this->model = $account;
    }
}
