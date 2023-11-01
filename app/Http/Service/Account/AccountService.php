<?php

namespace App\Http\Service\Account;

use App\Http\Repositories\Account\AccountRepository;
use App\Http\Service\BaseService;
use Illuminate\Support\Str;

class AccountService extends BaseService
{
    public function __construct(AccountRepository $accountRepository)
    {
        $this->repository = $accountRepository;
    }

    public function saveAccounts($connectionId, $accounts): void
    {
        foreach ($accounts as $account) {
            $accountData = [
                'uuid' => Str::uuid(),
                'connection_id' => $connectionId,
                'account_holder_name' => $account['account_holder_name'],
                'account_id' => $account['account_id'],
                'bank_name' => $account['bank_name'],
                'type' => $account['type'],
                'balance' => $account['balance'],
                'currency_code' => $account['currency_code'],
                'iban' => $account['iban'],
            ];

            $this->updateOrCreate(['account_id' => $account['account_id']], $accountData);
        }

    }
}
