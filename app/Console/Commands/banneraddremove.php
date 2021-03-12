<?php

namespace App\Console\Commands;

use Log;
use Carbon\Carbon;
use App\model\bannerliveadd;
use Illuminate\Console\Command;

class banneraddremove extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'banneraddremove:removebanner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check every day in the night banner validity';

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
        Log::info('---------------------------------------Banner Add '.Carbon::now().'start ------------------------------------------------');
        $bannerliveadds = bannerliveadd::where('till_date', '<', Carbon::today())->get();
        foreach ($bannerliveadds as $bannerliveadd) {
            Log::info($bannerliveadd);
            bannerliveadd::where('id', '=', $bannerliveadd->id)->delete();
        }
        Log::info('---------------------------------------Banner Text Add '.Carbon::now().'end ------------------------------------------------');
    }
}
