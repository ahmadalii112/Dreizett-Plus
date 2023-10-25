<?php

namespace App\Http\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
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
        //        return Cache::remember('fin_access_token', Carbon::now()->addHours(1), function () use ($grantType, $username, $password) {
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
//        });
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
            ],
            'allowTestBank' => true,
        ];

        return $bankConnectionData;
    }

    public function getWebFormStatus($webFormId)
    {
        $accessTokenResponse = $this->getAccessToken(
            grantType: 'password',
            username: env('FIN_API_USER', 'test'),
            password: env('FIN_API_PASSWORD', 'test')
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
            username: env('FIN_API_USER'),
            password: env('FIN_API_PASSWORD')
        );
        if (isset($accessTokenResponse['error'])) {
            return $accessTokenResponse;
        }
        $accessToken = $accessTokenResponse['access_token'];
        $params = array_merge($params, [
            'view' => 'userView',
            'page' => $page,
            'perPage' => 500,
            //'minBankBookingDate' => $startsAt->toDateString(),
        ]);
        try {
            $url = $this->baseUrl.'/api/v2/transactions/'.$transactionId;
            $response = Http::withToken($accessToken)->get($url, $params);

            return $response->successful()
                ? $response->json()
                : ['error' => $response->json()];

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAccounts($accountId)
    {
        $accessTokenResponse = $this->getAccessToken(
            grantType: 'password',
            username: env('FIN_API_USER', 'test'),
            password: env('FIN_API_PASSWORD', 'test')
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
         * Banks <--1:n--> Bank connections <--1:n--> Accounts <--1:n--> Transactions
         *
         */

        $accessTokenResponse = $this->getAccessToken(
            grantType: 'password',
            username: env('FIN_API_USER', 'test'),
            password: env('FIN_API_PASSWORD', 'test')
        );
        if (isset($accessTokenResponse['error'])) {
            return $accessTokenResponse;
        }
        $accessToken = $accessTokenResponse['access_token'];

        $url = $this->baseUrl.'/api/v2/accounts';

        $accountsApiParams = [];

        if (count($bankConnectionIds)) {
            $accountsApiParams['bankConnectionIds'] = implode(',', $bankConnectionIds);
        }
        $response = Http::withToken($accessToken)->get($url, $accountsApiParams);

        /** @var array|null */
        $accounts = $response->json('accounts');

        if ($accounts === null) {
            throw new \Exception(strval(__('Accounts not found in the response!')));
        }

        if (! count($accounts)) {
            return [];
        }

        $connectionIds = collect($accounts)->pluck('bankConnectionId')->unique();

        $url = $this->baseUrl.'/api/v2/bankConnections';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$accessToken,
        ])->get($url, [
            'ids' => $connectionIds->implode(','),
        ]);

        /** @var array|null */
        $bankConnections = $response->json('connections');

        if ($bankConnections === null) {
            throw new \Exception(strval(__('Bank connections not found in the response!')));
        }

        $bankIds = collect($bankConnections)->pluck('bankId')->unique();

        $url = $this->baseUrl.'/api/v2/banks';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$accessToken,
        ])->get($url, [
            'ids' => $bankIds->implode(','),
        ]);

        /** @var array|null */
        $banks = $response->json('banks');

        if ($banks === null) {

            throw new \Exception(strval(__('Banks not found in the response!')));
        }
        $bankConnections = collect($bankConnections)
            ->map(function ($bankConnection) use ($banks) {
                $bankConnection['bank'] = collect($banks)
                    ->where('id', $bankConnection['id'])
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

        $accounts = $accounts->map(function ($account) {

            return [
                'name' => $account['accountHolderName'],
                'external_id' => $account['id'],
                'bank_name' => $account['bank_connection']['name'],
                'type' => $account['accountType'],
                'balance' => $account['balance'],
                'currency_code' => $account['accountCurrency'],
                'iban' => $account['iban'] ?? null,
            ];
        });

        return $accounts;
    }
}
