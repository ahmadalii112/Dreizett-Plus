<?php

namespace App\Http\Service\Transaction;

use App\Http\Repositories\Transaction\TransactionRepository;
use App\Http\Service\BaseService;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class TransactionService extends BaseService
{
    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->repository = $transactionRepository;
    }

    public function getDatatables($data)
    {
        return DataTables::of($data)
            ->addColumn('transaction_date', fn ($row) => Carbon::parse($row?->transaction_date)->format('M d, Y') ?? 'N/A')
            ->addColumn('tenant', function ($transaction) {
                return $transaction?->tenant?->information?->name ?? \view('transactions.partials.table-action', compact('transaction'));
            })
            ->addIndexColumn()
            ->rawColumns(['tenant'])
            ->make(true);
    }
}
