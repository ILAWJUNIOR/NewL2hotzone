<?php

namespace App\Console\Commands;

use App\model\liveadd;
use App\model\Server;
use App\model\uptime_history;
use Carbon\Carbon;
use DB;
use Illuminate\Console\Command;
use Log;

class uptimefirstentry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uptimefirstentry:active';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store data in first time of uptime history';

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
        Log::info('---------------------------------------uptimedata first entry '.Carbon::now().'start ------------------------------------------------');

        $allserveres = Server::where('status', '=', 1)->where('delete_flag', 0)->orderBy('id', 'desc')->get();

        if ($allserveres) {
            $server_update_ids = [];
            //echo '<pre>';print_r($allserveres->toArray());die;
            $server_ippot_details = [];
            foreach ($allserveres as $key => $value) {
                $fp = @fsockopen($value->serverIp, $value->serverPort, $errno, $errstr, 10);
                $online = 0;
                if ($fp) {
                    $online = 1;
                    /*if online then set flag*/
                    $server_update_ids[] = $online;
                    /*End online flag set*/
                }
                $rows1[$key] = ['server_id'=>$value->id, 'created_at'=> date('Y-m-d')];
                /*End array operation here*/
            }

            if (! empty($rows1)) {

                /*This cron will run one time in whole day*/
                uptime_history::insert($rows1);
                /*This cron will run one time in whole day*/
            }
        }

        Log::info('---------------------------------------uptimedata first entry '.Carbon::now().'end ------------------------------------------------');
    }
}
