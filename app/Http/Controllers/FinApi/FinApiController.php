<?php

namespace App\Http\Controllers\FinApi;

use App\Http\Controllers\Controller;
use App\Http\Service\Account\AccountService;
use App\Http\Service\Connection\ConnectionService;
use App\Http\Service\FinAPIService;
use App\Http\Service\Transaction\TransactionService;
use App\Jobs\ProcessTransactionsJob;
use App\Models\Connection;
use Illuminate\Http\Request;

class FinApiController extends Controller
{
    public FinAPIService $finApiService;

    public ConnectionService $connectionService;

    public AccountService $accountService;

    public TransactionService $transactionService;

    public function __construct(
        FinAPIService $finApiService,
        ConnectionService $connectionService,
        AccountService $accountService,
        TransactionService $transactionService
    ) {
        $this->finApiService = $finApiService;
        $this->connectionService = $connectionService;
        $this->accountService = $accountService;
        $this->transactionService = $transactionService;
    }

    public function createBankConnection(Request $request)
    {
        $accessTokenResponse = $this->finApiService->getAccessToken(
            grantType: 'password',
            username: config('services.finapi.username'),
            password: config('services.finapi.password')
        );
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
        $webFomStatus = $this->finApiService->getWebFormStatus($webFormId);
        if (! empty($webFomStatus['payload'])) {
            $connection = $this->connectionService->updateBankConnection($webFormId, $webFomStatus);
            try {
                $accounts = $this->finApiService->fetchAccounts($webFomStatus['payload']);
            } catch (\Exception $exception) {
                return redirect()->route('settings.index')->with('notificationType', 'danger')->with('notificationMessage', $exception->getMessage());
            }
            $this->accountService->saveAccounts($connection, $accounts->toArray());

            dispatch(new ProcessTransactionsJob($connection));

            session()->forget('webFormId');

            return redirect()->route('settings.index')->with('notificationType', 'success')->with('notificationMessage', trans('language.finApi.web-form.status_complete'));

        } else {
            return redirect()->route('settings.index')
                ->with('notificationType', 'danger')
                ->with('notificationMessage', trans('language.finApi.web-form.status_not_completed', ['status' => trans('enums.connection_status.'.$webFomStatus['status'])]));
        }

    }

    public function transaction(Request $request, $transactionId = null)
    {
        return $this->finApiService->getTransactions(transactionId: $transactionId, params: $request->all());
    }

    public function banks($bankId = null)
    {
        return $this->finApiService->getBanks($bankId);
    }

    public function accounts()
    {
        return $this->finApiService->fetchAccounts();
    }

    public function saveTransactions(Connection $connection)
    {
        dispatch(new ProcessTransactionsJob($connection));

        return redirect()->route('settings.index')->with('notificationType', 'success')->with('notificationMessage', 'Transaction Saved Successfully');

    }
}
