<?php

namespace App\Console\Commands;

use App\model\liveadd;
use App\model\Server;
use App\model\uptime_history;
use Carbon\Carbon;
use DB;
use Illuminate\Console\Command;
use Log;

class uptimedata extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uptimedata:active';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store data in uptime history';

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
        Log::info('---------------------------------------uptimedata '.Carbon::now().'start ------------------------------------------------');

        /*cron for uptime history*/
        $allserveres = Server::where('status', '=', 1)->where('delete_flag', 0)->orderBy('id', 'desc')->get();

        if ($allserveres) {
            $server_update_ids = [];
            //echo '<pre>';print_r($allserveres->toArray());die;
            $server_ippot_details = [];
            foreach ($allserveres as $key => $value) {
                $fp1 = @fsockopen($value->serverIp, $value->serverPort, $errno, $errstr, 10);
                $fp2 = @fsockopen($value->loginIp, $value->loginPort, $errno, $errstr, 10);
                $online = 0;
                if ($fp1 || $fp2) {
                    $online = 1;
                    /*if online then set flag*/
                       // $server_update_ids[] = $online;
                        /*End online flag set*/
                }

                if ($online) {
                    $time = date('H');
                    if ($time < '12') {
                        DB::table('uptime_history')->where('server_id', $value->id)->whereDate('created_at', '=', date('Y-m-d'))->where('first_section_status', '=', 0)->update(['first_section_status' => '1']);
                    } else { //Last 12 hours
                        DB::table('uptime_history')->where('server_id', $value->id)->whereDate('created_at', '=', date('Y-m-d'))->where('second_section_status', '=', 0)->update(['second_section_status' => '1']);
                    }

                    Log::info('server id : '.$value->id);
                }

                // $rows1[$key] = array('server_id'=>$value->id, 'created_at'=> date('Y-m-d'));
                    /*End array operation here*/

                    // Log::info('server id : '.$value->id.' server Port : '.$value->serverPort.' server IP : '.$value->serverIp.' ONLINE STATUS : '.$online);
                    // Log::info('\n');
            }

            if (! empty($rows1)) {

                    /*This cron will run one time in whole day*/
                    //uptime_history::insert($rows1);
                    /* echo "done";die;*/
                    /*This cron will run one time in whole day*/
            }

            /*echo '<pre>';print_r($server_update_ids);
            echo '<pre>';print_r($uptim_h_array);die;*/
        }

        Log::info('---------------------------------------uptimedata Add '.Carbon::now().'end ------------------------------------------------');
    }
}
