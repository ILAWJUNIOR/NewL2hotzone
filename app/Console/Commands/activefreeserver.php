<?php

namespace App\Console\Commands;

use App\model\Server;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Log;

class activefreeserver extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'acfreserver:active';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Active all 2 days old free servers';

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
        Log::info('---------------------------------------activeFreeServer'.Carbon::today().'--------------------------------------------------');
        $serverlists = Server::whereRaw('DATE(created_at) = DATE_SUB(CURDATE(), INTERVAL 2 DAY)')->doesnthave('haspremium')->get();
        if ($serverlists->count()) {
            foreach ($serverlists as $serverlist) {
                Log::info($serverlist->id);
            }
            Server::whereRaw('DATE(created_at) = DATE_SUB(CURDATE(), INTERVAL 2 DAY)')->doesnthave('haspremium')->update(['status' =>1]);
        }
        Log::info('---------------------------------------activeFreeServer'.Carbon::now().'end--------------------------------------------------');
    }
}
