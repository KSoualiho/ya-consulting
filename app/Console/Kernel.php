<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\SendInterventionReminders::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Envoyer des rappels d'intervention toutes les 30 minutes
        $schedule->command('reminders:send')->everyThirtyMinutes();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}