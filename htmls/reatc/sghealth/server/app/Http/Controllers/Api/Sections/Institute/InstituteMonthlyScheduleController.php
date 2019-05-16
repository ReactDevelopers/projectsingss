<?php

namespace App\Http\Controllers\Api\Sections\Institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Views\InstituteMonthlyWorkSchedule;
use App\Models\WorkSchedule;
use App\Models\WorkScheduleCopyHistory;
use  App\ModelFilters\Universal\InstituteMonthlyWorkScheduleFilter;
use Carbon\Carbon;
use App\Events\RosterCreatedEvent;

class InstituteMonthlyScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $institutes_monthly_data = InstituteMonthlyWorkSchedule::filter($request->all(), InstituteMonthlyWorkScheduleFilter::class);

        $institutes_monthly_data = $request->page == "-1"  ? ['data' => $institutes_monthly_data->get()] : $institutes_monthly_data->paginate($request->page_size);

        return $this->setData($institutes_monthly_data)
            ->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $from_month = $request->from_month;
        $from_month_start_date = Carbon::parse($from_month .'-01');
        $from_month_end_date = $from_month_start_date->copy()->endOfMonth();

        $to_month = $request->to_month;
        $to_month_start_date = Carbon::parse($to_month .'-01');
        $to_month_end_date = $to_month_start_date->copy()->endOfMonth();

        $new_month_schedules = WorkSchedule::where([
            'institute_id' => $request->institute_id
        ])
        ->where('date', '>=', $from_month_start_date->format('Y-m-d'))
        ->where('date', '<=', $from_month_end_date->format('Y-m').'-'.$to_month_end_date->format('d'))
        ->get()->map(function($schedule) use ($to_month){

            $schedule->date = $to_month.'-'. date('d', strtotime($schedule->date) );

            return $schedule;
        });


        $old_month_schedules = WorkSchedule::where([
            'institute_id' => $request->institute_id
        ])
        ->where('date', '>=', $to_month_start_date->format('Y-m-d'))
        ->where('date', '<=', $to_month_end_date->format('Y-m-d'))
        ->get();

        if(count($old_month_schedules)){

            WorkScheduleCopyHistory::create([
                'user_id'           => \Auth::id(),
                'institute_id'      => $request->institute_id,
                'from_month'        => $from_month_start_date,
                'to_month'          => $to_month_start_date,
                'old_schedule_data' => json_encode($old_month_schedules),
                'new_schedule_data' => json_encode($new_month_schedules)
            ]);

            $old_month_schedules = WorkSchedule::where([
                'institute_id' => $request->institute_id
            ])
            ->where('date', '>=', $to_month_start_date->format('Y-m-d'))
            ->where('date', '<=', $to_month_end_date->format('Y-m-d'))
            ->delete();
        }

        /**
         * insert new record from copied data
         */
        if(count($new_month_schedules)){

            $new_month_schedules = $new_month_schedules->toArray();

            foreach($new_month_schedules as $schedule_key => $schedule_value){
                $work_schedule = WorkSchedule::create([
                    'institute_id'          => $schedule_value['institute_id'],
                    'branch_id'             => $schedule_value['branch_id'],
                    'service_id'            => $schedule_value['service_id'],
                    'date'                  => $schedule_value['date'],
                    'start_time'            => $schedule_value['start_time'],
                    'end_time'              => $schedule_value['end_time'],
                    'user_id'               => $schedule_value['user_id'],
                    'created_by'            => \Auth::id(),
                    'work_auto_schedule_id' => $schedule_value['work_auto_schedule_id'],
                    'options'               => $schedule_value['options'],
                ]);

                event(new RosterCreatedEvent($work_schedule));
            }
        }

        return $this->setData($new_month_schedules)->setMessage('Schedule copied successfully')->response(200);

    }

    /***
     * vaidate the request
     */
    protected function validation(Request $request){

        $request->validate([
            'institute_id'      => ['required'],
            'from_month'         => ['required'],
            'to_month'           => ['required','different:from_month'],
        ]);
    }
}
