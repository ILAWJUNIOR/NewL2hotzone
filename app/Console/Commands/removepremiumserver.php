<?php

namespace App\Console\Commands;

use Log;
use Carbon\Carbon;
use App\model\Premiumserver;
use Illuminate\Console\Command;
use App\model\serverpremiumcontent;

class removepremiumserver extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'removepremiumserver:serverpremium';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove premium server from list if date has expired';

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
        Log::info('---------------------------------------Premium Server Remove '.Carbon::now().'start ------------------------------------------------');
        $premiums = Premiumserver::where('till_date', '<', Carbon::today())->get();
        foreach ($premiums as $premium) {
            Log::info($premium);
            Log::info(serverpremiumcontent::where('server_id', '=', $premium->server_id)->first());
            Premiumserver::where('id', '=', $premium->id)->delete();
            serverpremiumcontent::where('server_id', '=', $premium->server_id)->delete();
        }
        Log::info('---------------------------------------Premium Server Remove '.Carbon::now().'end ------------------------------------------------');
    }
}
