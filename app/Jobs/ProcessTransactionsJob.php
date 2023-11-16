<?php

namespace App\Jobs;

use App\Http\Service\FinAPIService;
use App\Http\Service\Transaction\TransactionService;
use App\Models\Connection;
use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProcessTransactionsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $connectionId;

    public function __construct(Connection $connectionId)
    {
        $this->connectionId = $connectionId;
    }

    public function handle(FinApiService $finApiService, TransactionService $transactionService)
    {
        try {
            // Start a database transaction
            DB::beginTransaction();

            // Log a message when the job starts
            Log::info('Processing transactions');

            $result = $finApiService->fetchAndMapTransactions($this->connectionId);

            // Log a message with the number of transactions fetched
            Log::info('Fetched '.count($result)." transactions for Connection ID: {$this->connectionId?->id}");

            foreach ($result as $transactionData) {
                $transactionService->updateOrCreate(
                    where: ['transaction_id' => $transactionData['transaction_id']],
                    data: [
                        'connection_id' => $transactionData['connection_id'],
                        'account_id' => $transactionData['account_id'],
                        'fin_api_account_id' => $transactionData['fin_api_account_id'],
                        'transaction_date' => $transactionData['transaction_date'],
                        'payment_partner_name' => $transactionData['payment_partner_name'],
                        'reference_purpose' => $transactionData['reference_purpose'],
                        'details' => $transactionData['details'],
                        'tenant_id' => $transactionData['tenant_id'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]

                );
            }

            // Log a success message
            Log::info("Transactions processed successfully for Connection ID: {$this->connectionId->id}");
            DB::commit();
        } catch (\Exception $e) {
            // An error occurred, so rollback the database transaction
            DB::rollBack();
            // Log an error message
            Log::error("Error processing transactions: {$e->getMessage()}");

        }
    }
}
