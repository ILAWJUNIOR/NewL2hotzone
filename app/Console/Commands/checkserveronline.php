<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class checkserveronline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkserveronline:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check server status is onlne or not';

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
        //
    }
}
