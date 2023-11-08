<?php

namespace App\Console\Commands;

use App\Enums\ConnectionStatusEnum;
use App\Http\Service\FinAPIService;
use App\Http\Service\Transaction\TransactionService;
use App\Models\Connection;
use DB;
use Illuminate\Console\Command;

class FetchTransactions extends Command
{
    public $finAPIService;

    public TransactionService $transactionService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch-transactions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and map transactions for completed connections';

    public function __construct(TransactionService $transactionService)
    {
        parent::__construct();
        $this->finAPIService = new FinAPIService();
        $this->transactionService = $transactionService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::beginTransaction();
        try {
            $connections = Connection::where('status', ConnectionStatusEnum::COMPLETED->value)->get();
            if ($connections->isNotEmpty()) {
                $this->info('Please Wait! we found some connections, fetching transactions');
                $transactions = collect([]);
                foreach ($connections as $connection) {
                    $transactions = $this->finAPIService->fetchAndMapTransactions($connection);
                }
                $this->info('transactions fetched and mapped for completed connections.');
                $this->info('Inserting transactions into the DB.');
                $this->transactionService->insert($transactions->toArray());
                $this->info('Transaction Saved SuccessFully');
            } else {
                $this->warn('No Connection found');
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->error('An error occurred: '.$exception->getMessage());
        }
    }
}
