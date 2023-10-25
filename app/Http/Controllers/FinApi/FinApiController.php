<?php

namespace App\Http\Controllers\FinApi;

use App\Http\Controllers\Controller;
use App\Http\Service\FinAPIService;
use App\Models\Connection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FinApiController extends Controller
{
    public FinAPIService $finApiService;

    public function __construct(FinAPIService $finApiService)
    {
        $this->finApiService = $finApiService;
    }

    public function createBankConnection(Request $request)
    {
        $accessTokenResponse = $this->finApiService->getAccessToken(grantType: 'password', username: $request->username, password: $request->password);
        if (isset($accessTokenResponse['error'])) {
            return redirect()->back()->with('notificationType', 'danger')->with('notificationMessage', $accessTokenResponse['error']['message']);
        }
        $token = $accessTokenResponse['access_token'];
        $bankConnectionData = $this->finApiService->getBankConnectionData();

        $result = $this->finApiService->createBankConnection($token, $bankConnectionData);
        Connection::create([
            'uuid' => Str::uuid(),
            'external_id' => $result['id'],
            'secret_identifier' => 'Hash',
            'start_date' => now()->format('Y-m-d'),
            'status' => $result['status'],
            'type' => $result['type'],
            'bank_connection_id' => null,
        ]);

        return array_key_exists('url', $result)
            ? redirect()->to($result['url'])
            : redirect()->back()->with('notificationType', 'danger')->with('notificationMessage', "{$result['error']['code']} {$result['error']['description']}");
    }

    public function webFormStatus($webFormId)
    {
        return $this->finApiService->getWebFormStatus($webFormId);

    }

    public function transaction($transactionId = null)
    {
        return $this->finApiService->getTransactions($transactionId);
    }

    public function banks($bankId = null)
    {
        return $this->finApiService->getBanks($bankId);
    }

    public function accounts($accountId = null)
    {
        return $this->finApiService->fetchAccounts();
        //        return $this->finApiService->getAccounts($accountId);
    }
}
