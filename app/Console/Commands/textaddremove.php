<?php

namespace App\Console\Commands;

use App\model\liveadd;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Log;

class textaddremove extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'textaddremove:removeadd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove text add if date has expired';

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
        Log::info('---------------------------------------Remove Text Add '.Carbon::now().'start ------------------------------------------------');
        $liveadds = liveadd::where('till_date', '<', Carbon::today())->get();
        foreach ($liveadds as $liveadd) {
            Log::info($liveadd);
            liveadd::where('id', '=', $liveadd->id)->delete();
        }
        Log::info('---------------------------------------Remove Text Add '.Carbon::now().'end ------------------------------------------------');
    }
}
