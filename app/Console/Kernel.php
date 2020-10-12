<?php

namespace App\Console;

use App\Models\Task;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use  Illuminate\Support\Facades\DB;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        Commands\Swoole::Class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            DB::table('users')->update(['drawamount'=>4]);
            $a=Task::where('type',2)->pluck('id');
            DB::table('users_task')->whereIn('task_id',$a)->update(['status'=>1,'sum'=>0]);
        })->daily();
        $schedule->call(function () {
            DB::table('users')->update(['boxtwo'=>5,'box'=>6]);
        })->twiceDaily(7, 22);
        $schedule->call(function () {
            $b=Task::where('type',1)->pluck('id');
            DB::table('users_task')->whereIn('task_id',$b)->update(['status'=>1,'sum'=>0]);
        })->weeklyOn(1, '8:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
