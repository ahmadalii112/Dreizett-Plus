<?php

namespace App\Console\Commands;

use App\Enums\ConnectionStatusEnum;
use App\Http\Service\FinAPIService;
use App\Http\Service\Transaction\TransactionService;
use App\Jobs\ProcessTransactionsJob;
use App\Models\Connection;
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

        $connections = Connection::where('status', ConnectionStatusEnum::COMPLETED->value)->get();
        if ($connections->isNotEmpty()) {
            $this->info('Job is being executed Please Wait!');
            foreach ($connections as $connection) {
                dispatch(new ProcessTransactionsJob($connection));
            }
        } else {
            $this->warn('No Connection found');
        }

    }
}
