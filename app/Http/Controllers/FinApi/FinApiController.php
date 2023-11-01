<?php

namespace App\Http\Controllers\FinApi;

use App\Http\Controllers\Controller;
use App\Http\Service\Account\AccountService;
use App\Http\Service\Connection\ConnectionService;
use App\Http\Service\FinAPIService;
use Illuminate\Http\Request;

class FinApiController extends Controller
{
    public FinAPIService $finApiService;

    public ConnectionService $connectionService;

    public AccountService $accountService;

    public function __construct(
        FinAPIService $finApiService,
        ConnectionService $connectionService,
        AccountService $accountService
    ) {
        $this->finApiService = $finApiService;
        $this->connectionService = $connectionService;
        $this->accountService = $accountService;
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
        $this->connectionService->createConnection($result);
        session(['webFormId' => $result['id']]);

        return array_key_exists('url', $result)
            ? redirect()->to($result['url'])
            : redirect()->back()->with('notificationType', 'danger')->with('notificationMessage', "{$result['error']['code']} {$result['error']['description']}");
    }

    public function webFormStatus($webFormId)
    {
        $result = $this->finApiService->getWebFormStatus($webFormId);
        if (empty($result['payload'])) {
            return redirect()->route('settings.index')->with('notificationType', 'danger')->with('notificationMessage', 'The process is not completed yet please do it first');
        } else {
            $bankConnectionId = $result['payload']['bankConnectionId'];
            $connection = $this->connectionService->updateBankConnection($webFormId, $bankConnectionId);
            $accounts = $this->finApiService->fetchAccounts($result['payload']);
            $this->accountService->saveAccounts($connection->id, $accounts->toArray());

            session()->forget('webFormId');

            //            return redirect()->route('settings.index')->with('notificationType', 'success')->with('notificationMessage', 'Accounts Saved Successfully');
            return $accounts;

        }

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
