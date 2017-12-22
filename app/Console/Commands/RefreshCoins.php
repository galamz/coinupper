<?php

namespace App\Console\Commands;

use App\Http\Controllers\CoinMarketCapController;
use Illuminate\Console\Command;

class RefreshCoins extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh:coins';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command will be refresh all coins prices and market Cap.';

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
     * @return mixed
     */
    public function handle()
    {
        $classCoinMarketCapController = new CoinMarketCapController;
        $classCoinMarketCapController->index();

    }
}
