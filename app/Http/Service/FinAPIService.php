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
        $this->baseUrl = 'https://sandbox.finapi.io';
        $this->webFormUrl = 'https://webform-sandbox.finapi.io';
        $this->apiKey = env('CLIENT_ID');
        $this->apiSecret = env('CLIENT_SECRET');
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

    public function getTransactions($view, $transactionId)
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
        try {
            $response = Http::withToken($accessToken)->get($this->baseUrl.'/api/v2/transactions/'.$transactionId, [
                'view' => $view,
            ]);

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
            username: env('FIN_API_USER'),
            password: env('FIN_API_PASSWORD')
        );
        if (isset($accessTokenResponse['error'])) {
            return $accessTokenResponse;
        }
        $accessToken = $accessTokenResponse['access_token'];
        try {
            $response = Http::withToken($accessToken)->get($this->baseUrl.'/api/v2/accounts/'.$accountId);

            return $response->successful()
                ? $response->json()
                : ['error' => $response->json()];

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
