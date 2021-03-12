<?php

namespace App\Console\Commands;

use DB;
use Log;
use Carbon\Carbon;
use App\model\stream;
use App\model\liveadd;
use App\model\bannerliveadd;
use App\model\Premiumserver;
use Illuminate\Console\Command;

class checkexpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkexpired:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check the expire of all advertisement and streams';

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
        Log::info('---------------------------------------expired'.Carbon::today().'--------------------------------------------------');
        $date = date('Y-m-d H:i:s');

        $streamData = [['expired_date', '<', $date], ['status', '=', '1']];
        $stream = (new stream())->getTable();
        DB::table($stream)->where($streamData)->update(['status' => 0]);

        $bannerliveadd = (new bannerliveadd())->getTable();
        $livebannerData = [['till_date', '<', $date], ['active_status', '=', '1']];
        DB::table($bannerliveadd)->where($livebannerData)->update(['active_status' => 0]);

        $liveadd = (new liveadd())->getTable();
        $liveaddData = [['till_date', '<', $date], ['active_status', '=', '1']];
        DB::table($liveadd)->where($liveaddData)->update(['active_status' => 0]);

        $premiumserver = (new Premiumserver())->getTable();
        $premiumData = [['till_date', '<', $date], ['active_status', '=', '1']];
        DB::table($premiumserver)->where($premiumData)->update(['active_status' => 0]);

        Log::info('Working------');
    }
}
