<?php

namespace App\Http\Service;

use App\Models\Connection;
use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class FinAPIService
{
    protected $baseUrl;

    protected $webFormUrl;

    protected $apiKey;

    protected $apiSecret;

    protected $grantType;

    public function __construct()
    {
        $this->baseUrl = config('services.finapi.base_url');
        $this->webFormUrl = config('services.finapi.webform_base_url');
        $this->apiKey = config('services.finapi.client_id');
        $this->apiSecret = config('services.finapi.client_secret');
    }

    public function getAccessToken($grantType = 'client_credentials', $username = null, $password = null)
    {
        try {
            $response = Http::asForm()->post($this->baseUrl.'/api/v2/oauth/token', [
                'grant_type' => $grantType,
                'client_id' => $this->apiKey,
                'client_secret' => $this->apiSecret,
                'username' => $username,
                'password' => $password,
            ]);

            return $response->successful()
                ? $response->json()
                : ['error' => reset($response->json()['errors'])];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function createBankConnection($accessToken, $bankConnectionData)
    {
        try {
            $response = Http::withToken($accessToken)->post($this->webFormUrl.'/api/webForms/bankConnectionImport', $bankConnectionData);

            return $response->successful()
                ? $response->json()
                : ['error' => $response->json()];

        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getBankConnectionData(): array
    {
        $bankConnectionData = [
            'bank' => [
                'search' => 'DEMO0002',
                //                'search' => 'DEMO0001',
            ],
            'bankConnectionName' => 'finAPI Test Redirect Bank',
            'skipBalancesDownload' => false,
            'skipPositionsDownload' => false,
            'loadOwnerData' => false,
            'maxDaysForDownload' => 3650,
            'accountTypes' => [
                'CHECKING',
                'SAVINGS',
                'CREDIT_CARD',
                'SECURITY',
                'MEMBERSHIP',
                'LOAN',
                'BAUSPAREN',
            ],
            'callbacks' => [
                'finalised' => 'https://dev.finapi.io/callback?state=DEMO0002',
                //                'finalised' => 'https://dev.finapi.io/callback?state=DEMO0001',
            ],
            'allowTestBank' => true,
        ];

        return $bankConnectionData;
    }

    public function getWebFormStatus(string $webFormId)
    {
        $accessTokenResponse = $this->getAccessToken(
            grantType: 'password',
            username: config('services.finapi.username'),
            password: config('services.finapi.password')
        );
        if (isset($accessTokenResponse['error'])) {
            return $accessTokenResponse;
        }
        $accessToken = $accessTokenResponse['access_token'];
        try {
            $response = Http::withToken($accessToken)->get($this->webFormUrl.'/api/webForms/'.$webFormId);

            return $response->successful()
                ? $response->json()
                : ['error' => $response->json()];

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getBanks($bankId)
    {
        $accessTokenResponse = $this->getAccessToken();
        if (isset($accessTokenResponse['error'])) {
            return $accessTokenResponse;
        }
        $accessToken = $accessTokenResponse['access_token'];
        try {
            $response = Http::withToken($accessToken)->get($this->baseUrl.'/api/v2/banks/'.$bankId);

            return $response->successful()
                ? $response->json()
                : ['error' => $response->json()];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getTransactions($transactionId = null, int $page = 1, array $params = [])
    {
        $accessTokenResponse = $this->getAccessToken(
            grantType: 'password',
            username: config('services.finapi.username'),
            password: config('services.finapi.password')
        );
        if (isset($accessTokenResponse['error'])) {
            return $accessTokenResponse;
        }
        $accessToken = $accessTokenResponse['access_token'];
        $params = array_merge($params, [
            'view' => 'userView',
            'page' => $page,
            'perPage' => 500,
        ]);
        try {
            $url = $this->baseUrl.'/api/v2/transactions/'.$transactionId;
            $response = Http::withToken($accessToken)->get($url, $params);

            return $response->successful()
                ? $response->json('transactions')
                : ['error' => $response->json()];

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAccounts($accountId)
    {
        $accessTokenResponse = $this->getAccessToken(
            grantType: 'password',
            username: config('services.finapi.username'),
            password: config('services.finapi.password')
        );
        if (isset($accessTokenResponse['error'])) {
            return $accessTokenResponse;
        }
        $accessToken = $accessTokenResponse['access_token'];
        try {
            $url = $this->baseUrl.'/api/v2/accounts/'.$accountId;
            $response = Http::withToken($accessToken)->get($url);

            return $response->successful()
                ? $response->json()
                : ['error' => $response->json()];

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function fetchAccounts(array $bankConnectionIds = [])
    {
        /*
         * FinAPI structure of banks, connections, accounts and transactions
         *
         * Banks <--1:n--> Bank connections <--1:n--> Accounts <--1:n--> transactions
         *
         */

        $accessTokenResponse = $this->getAccessToken(
            grantType: 'password',
            username: config('services.finapi.username'),
            password: config('services.finapi.password')
        );
        if (isset($accessTokenResponse['error'])) {
            return $accessTokenResponse;
        }
        $accessToken = $accessTokenResponse['access_token'];

        // Get Accounts API CALL
        $url = $this->baseUrl.'/api/v2/accounts';

        $accountsApiParams = [];

        if (count($bankConnectionIds)) {
            $accountsApiParams['bankConnectionIds'] = implode(',', $bankConnectionIds);
        }
        $response = Http::withToken($accessToken)->get($url, $accountsApiParams);

        $accounts = $response->json('accounts');

        if ($accounts === null) {
            throw new \Exception(strval(__('Accounts not found in the response!')));
        }

        if (! count($accounts)) {
            return [];
        }

        $connectionIds = collect($accounts)->pluck('bankConnectionId')->unique();

        // Get bankConnections API CALL

        $url = $this->baseUrl.'/api/v2/bankConnections';

        $response = Http::withToken($accessToken)->get($url, [
            'ids' => $connectionIds->implode(','),
        ]);

        $bankConnections = $response->json('connections');

        if ($bankConnections === null) {
            throw new \Exception(strval(__('Bank connections not found in the response!')));
        }

        $bankIds = collect($bankConnections)->pluck('bank.id')->unique();

        $url = $this->baseUrl.'/api/v2/banks';

        $response = Http::withToken($accessToken)->get($url, [
            'ids' => $bankIds->implode(','),
        ]);

        $banks = $response->json('banks');
        //        dd(['bankConnection' => $bankConnections], ['banks' => $banks]);

        if ($banks === null) {
            throw new \Exception(strval(__('Banks not found in the response!')));
        }
        $bankConnections = collect($bankConnections)
            ->map(function ($bankConnection) use ($banks) {
                $bankConnection['bank'] = collect($banks)
                    ->where('id', $bankConnection['bank']['id'])
                    ->first();

                return $bankConnection;
            });

        $accounts = collect($accounts)
            ->map(function ($account) use ($bankConnections) {
                $account['bank_connection'] = collect($bankConnections)
                    ->where('id', $account['bankConnectionId'])
                    ->first();

                return $account;
            });
        //        return $accounts;

        $accounts = $accounts->map(function ($account) {

            return [
                'account_holder_name' => $account['accountHolderName'],
                'account_id' => $account['id'],
                'bank_connection_Id' => $account['bankConnectionId'],
                'bank_name' => $account['bank_connection']['name'],
                'type' => $account['accountType'],
                'balance' => $account['balance'],
                'currency_code' => $account['accountCurrency'],
                'iban' => $account['iban'] ?? null,
            ];
        });

        return $accounts;
    }

    public function fetchAndMapTransactions(Connection $connection): Collection
    {
        $page = 1;

        $isLastPage = false;

        $transactions = collect([]);
        $connectionId = $connection->id;

        $accountIds = $connection->accounts()->select('account_id')->pluck('account_id')->implode(',');

        while (! $isLastPage) {
            $finApiTransactions = $this->getTransactions(null, $page, [
                'accountIds' => $accountIds,
            ]);

            foreach ($finApiTransactions as $finApiTransaction) {
                $account = $connection->accounts()
                    ->where('account_id', $finApiTransaction['accountId'])
                    ->first();

                // Find the tenant based on counterpartName
                $matchingTenant = Tenant::withWhereHas('information', function ($query) use ($finApiTransaction) {
                    $query->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ['%'.$finApiTransaction['counterpartName'].'%']);
                })->first();

                $tenant_id = $matchingTenant ? $matchingTenant->id : null;
                $data = [
                    'connection_id' => $connection->id,
                    'account_id' => $account?->id,
                    'fin_api_account_id' => (int) $account?->account_id,
                    'transaction_id' => $finApiTransaction['id'],
                    'transaction_date' => Carbon::parse($finApiTransaction['bankBookingDate']),
                    'payment_partner_name' => $finApiTransaction['counterpartName'] ?? 'unknown',
                    'reference_purpose' => $finApiTransaction['purpose'],
                    'details' => $finApiTransaction['purpose'],
                    'tenant_id' => $tenant_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                //                dd($data);
                $transactions->push($data);
            }

            $page++;

            $isLastPage = $this->isLastPage($finApiTransactions);
        }

        return $transactions;
    }

    private function isLastPage(array $transactions): bool
    {
        return ! count($transactions);
    }
}
