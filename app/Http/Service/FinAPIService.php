<?php

namespace App\Http\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class FinAPIService
{
    protected $baseUrl;

    protected $apiKey;

    protected $apiSecret;

    protected $grantType;

    public function __construct()
    {
        $this->baseUrl = 'https://sandbox.finapi.io';
        $this->apiKey = env('CLIENT_ID');
        $this->apiSecret = env('CLIENT_SECRET');
        $this->grantType = 'client_credentials';
    }

    public function getAccessToken($grantType, $username = null, $password = null)
    {
        return Cache::remember('fin_access_token', Carbon::now()->addHours(1), function () use ($grantType, $username, $password) {
            try {
                $response = Http::asForm()->post($this->baseUrl.'/api/v2/oauth/token', [
                    'grant_type' => $grantType,
                    'client_id' => $this->apiKey,
                    'client_secret' => $this->apiSecret,
                    'username' => $username,
                    'password' => $password,
                ]);

                $data = $response->json();

                return $data['access_token'] ?? null;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        });
    }

    public function getBanks($id = null)
    {
        $accessToken = $this->getAccessToken($this->grantType);

        try {
            $response = Http::withToken($accessToken)->get($this->baseUrl.'/api/v2/banks/'.$id);
            // Check if the request was successful
            if ($response->successful()) {
                return $response->json();
            } else {
                return $response->json()['errors'];
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getTransactions($view, $id = null)
    {
        $this->grantType = 'password';
        $accessToken = $this->getAccessToken(
            grantType: $this->grantType,
            username: 'ahmadalii',
            password: 'password'
        );

        try {
            $response = Http::withToken($accessToken)->get($this->baseUrl.'/api/v2/transactions/'.$id, [
                'view' => $view,
            ]);
            if ($response->successful()) {
                return $response->json();
            } else {
                return $response->json()['errors'];
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
