<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\WorkSchedule;
use App\Models\WorkAutoSchedule;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Branch;
use App\Lib\SgApp;
use App\Events\RosterCreatedEvent;
use App\Events\RosterDeletedEvent;

class RosterScheduleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $work_auto_schedule;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($work_auto_schedule)
    {
        //
        $this->work_auto_schedule = $work_auto_schedule;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

        $last_work_schedule = WorkSchedule::where('work_auto_schedule_id', $this->work_auto_schedule->id)
           ->orderBy('date', 'asc')->first();

        $branch = Branch::find($this->work_auto_schedule->branch_id);
        $start_date =  $last_work_schedule ? $last_work_schedule->addDays(1) : Carbon::parse($this->work_auto_schedule->auto_schedule_next_date);

        $from_date = $start_date->format('Y-m-d');
        $to_date = $start_date->addDays(30)->format('Y-m-d');

        $period = CarbonPeriod::between($from_date, $to_date);
        $options = $this->work_auto_schedule->options;

        foreach($period as $date) {

            $start_time = $options['times'][0];
            $end_time = $options['times'][1];

            if(in_array($date->format('D') , ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] ) && is_array($branch->mon_fri_timing) && count($branch->mon_fri_timing) == 2 ) {

                $start_time = $branch->mon_fri_timing[0];
                $end_time = $branch->mon_fri_timing[1];

            } else if($date->format('D') == 'Sun' && is_array($branch->sunday_timing) && count($branch->sunday_timing) == 2 ) {

                $start_time = $branch->sunday_timing[0];
                $end_time = $branch->sunday_timing[1];

            } else if($date->format('D') == 'Sat') {

                $start_time = $branch->sunday_timing[0];
                $end_time = $branch->sunday_timing[1];
            }

            if($this->work_auto_schedule->schedule_type == 'weekly'  ) {

                if(is_array($options['week_days']) && count($options['week_days']) && !in_array($date->format('D'), $options['week_days'] ) ) {

                    //echo 'Skip day is not matched.'.PHP_EOL;
                    continue;
                }
            }

            # Check if User is engaged in other schedule for this date & time.
            $work_schedule = \App\Lib\SgApp::haveWorkSchedule($this->work_auto_schedule->user_id, $date->format('Y-m-d'), $start_time, $end_time);

            if($work_schedule) {

                echo 'Has Work Schedule'.PHP_EOL;

                if(isset($options['overwrite_current_schedule'] ) && $options['overwrite_current_schedule'] == 'Yes') {

                    $work_schedule->delete();
                    $this->createSchedule( $date->format('Y-m-d'), $start_time, $end_time );
                    event(new RosterDeletedEvent($work_schedule));
                    //echo 'Deleted and created new one'.PHP_EOL;
                    continue;

                }

                //echo 'Skipped' .PHP_EOL;

                continue;
            }

            $this->createSchedule( $date->format('Y-m-d'), $start_time, $end_time );
        }

        # When schedule has been End Updating the Work auto schedule.
        $next_schedule_start_date = $period->last()->copy()->subDays(15)->format('Y-m-d');
        $work_auto_schedule  = WorkAutoSchedule::find($this->work_auto_schedule->id);
        $work_auto_schedule->update(['auto_schedule_next_date' => $next_schedule_start_date]);
    }

    private function createSchedule($date, $start_time, $end_time) {

        $work_schedule =  WorkSchedule::create([
            'institute_id' => $this->work_auto_schedule->institute_id,
            'branch_id' => $this->work_auto_schedule->branch_id,
            'service_id' => $this->work_auto_schedule->service_id,
            'date' => $date,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'user_id' => $this->work_auto_schedule->user_id,
            'work_auto_schedule_id'=> $this->work_auto_schedule->id,
            'created_by' => null
        ]);

        event(new RosterCreatedEvent($work_schedule));

        return $work_schedule;
    }
}
