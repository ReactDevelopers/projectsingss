<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\WorkAutoSchedule;
use Carbon\Carbon;
use App\Jobs\RosterScheduleJob;

class RosterScheduleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roster:schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Schedule the Roster.';

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
        $schedules = WorkAutoSchedule::where('auto_schedule_next_date', '<=', Carbon::now()->format('Y-m-d'))
            ->get();

        foreach($schedules as $schedule) {

            RosterScheduleJob::dispatch($schedule);
        }
    }
}
