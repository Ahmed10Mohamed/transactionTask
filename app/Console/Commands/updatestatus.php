<?php

namespace App\Console\Commands;

use App\Jobs\updateTransactionStatus;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class updatestatus extends Command
{

    protected $signature = 'transaction:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this used to update status of transaction outstanding or overdue';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        dispatch(new updateTransactionStatus());
    }
}
