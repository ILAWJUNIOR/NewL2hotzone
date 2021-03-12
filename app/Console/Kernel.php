<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\activefreeserver::class,
        Commands\banneraddremove::class,
        Commands\checkserveronline::class,
        Commands\removepremiumserver::class,
        Commands\textaddremove::class,
        Commands\checkexpired::class,
        Commands\uptimedata::class,
        Commands\uptimefirstentry::class,
        Commands\removepremiumserver::class,
        Commands\serverredirectioncounter::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->command('acfreserver:active')->dailyAt('00:00');
        $schedule->command('removepremiumserver:serverpremium')->dailyAt('00:05');
        $schedule->command('checkexpired:expired')->twiceDaily(1, 13);
        $schedule->command('uptimefirstentry:active')->dailyAt('00:00');
        $schedule->command('uptimedata:active')->everyMinute();
        $schedule->command('serverredirectioncounter:active')->monthlyOn(1, '00:00');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
