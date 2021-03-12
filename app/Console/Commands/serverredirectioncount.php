<?php
namespace App\Console\Commands;

use Log;
use Carbon\Carbon;
use Illuminate\Console\Command;
use DB;

class serverredirectioncounter extends Command
{
	protected $signature = 'serverredirectioncounter:active';

	 protected $description = 'reset all redirection url data from server_redirection_user_counter table';

	 public function __construct()
    {
        parent::__construct();
    }

     public function handle()
    {
	   Log::info('---------------------------------------Server Redirection User Count '.Carbon::now().'start ------------------------------------------------');

	   	DB::table('server_redirect_user_counter')->where(['clon_status'=>0])->update(['clon_status'=>1,'updated_at'=>now()]);

	    Log::info('---------------------------------------Server Redirection User Count '.Carbon::now().'end ------------------------------------------------');
    }
}