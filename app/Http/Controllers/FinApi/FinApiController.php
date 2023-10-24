<?php

namespace App\Http\Controllers\FinApi;

use App\Http\Controllers\Controller;
use App\Http\Service\FinAPIService;
use Illuminate\Http\Request;

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

        $result = $this->finApiService->createBankConnection($token, $bankConnectionData);

        return array_key_exists('url', $result)
            ? redirect()->to($result['url'])
            : redirect()->back()->with('notificationType', 'danger')->with('notificationMessage', "{$result['error']['code']} {$result['error']['description']}");
    }

    public function transaction($transactionId = null)
    {
        return $this->finApiService->getTransactions('userView', $transactionId);
    }

    public function banks($bankId = null)
    {
        return $this->finApiService->getBanks($bankId);
    }

    public function accounts($accountId = null)
    {
        return $this->finApiService->getAccounts($accountId);
    }
}
