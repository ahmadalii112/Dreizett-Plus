<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Service\Transaction\TransactionService;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public TransactionService $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index(Request $request)
    {
        $transactions = $this->transactionService->select(with: ['tenant']);
        if ($request->ajax()) {
            return $this->transactionService->getDatatables($transactions);
        }

        return view('transactions.index', compact('transactions'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $this->transactionService->update(where: ['id' => $transaction->id], data: ['tenant_id' => $request->tenant_id]);

        return redirect()->route('transactions.index')
            ->with('notificationType', 'success')
            ->with('notificationMessage', 'Tenant assigned successfully');
    }
}
