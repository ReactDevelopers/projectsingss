<?php

namespace App\Http\Controllers\Api\Sections\Roster;

use App\Models\Institute;
use App\Models\WorkSchedule;
use Illuminate\Http\Request;
use App\Models\WorkAutoSchedule;
use App\Http\Controllers\Controller;
use App\Models\ScheduledDayInformation;
use App\Exports\InstituteMonthlyRosterExport;
use App\Exports\InstituteMonthlyScheduleExport;
use App\Exports\ExportMyRosterDetail;
use App\ModelFilters\Universal\WorkScheduleFilter;
use Maatwebsite\Excel\Facades\Excel;
use App\Events\RosterCreatedEvent;
use App\Events\RosterDeletedEvent;
use App\Notifications\RosterExportNotification;

class RosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        app('permission')->throwExceptionUpdatingOtherInstitue($request->institute_id);

        if($request->export == 'excel') {
            return Excel::download(new InstituteMonthlyRosterExport($request->institute_id, $request->month), 'roster.xlsx');
        }
        /**
         * Fetching the Work schedule list of a given month and institute
         */
        $work_schedules = WorkSchedule::where('institute_id', $request->institute_id)
            ->whereRaw("DATE_FORMAT(work_schedules.date, '%Y-%m') = '{$request->month}'")
            ->with(['user' => function ($q) {
                $q->select('id', 'name');
            }])
            ->get();

        /**
         * Fetching Institute Comments For a given month
         */
        $day_comments = ScheduledDayInformation::where('scheduled_day_informations.institute_id', $request->institute_id)
        ->whereRaw("DATE_FORMAT(scheduled_day_informations.date, '%Y-%m') = '{$request->month}'")
            ->get();

        /**
         * Fetching Auto Work Schedule.
         */

        $work_auto_schedules = WorkAutoSchedule::where('work_auto_schedules.institute_id', $request->institute_id)
            ->whereRaw("DATE_FORMAT(work_auto_schedules.schedule_start_date, '%Y-%m') = '{$request->month}'")
            ->with(['user' => function ($q) {
                $q->select('id', 'name');
            }])
        ->get();

        return $this->setData([
            'work_schedules' => $work_schedules,
            'work_auto_schedules' => $work_auto_schedules,
            'day_comments' => $day_comments,
        ])
        ->response();
    }

    /**
     * To get the current user Schedule.
     */
    public function myRoster(Request $request) {

        $this->validate($request, [
            'month' => 'required'
        ]);
        $message = 'Roster List';

        if($request->export == 'excel') {

            $excel_path = 'roster.xlsx';
            // Excel::store(new InstituteMonthlyScheduleExport(\Auth::user()->institute_ids, $request->month), $excel_path);
            Excel::store(new ExportMyRosterDetail($request->month), $excel_path);

            $user = \Auth::User();
            $user->notify(new RosterExportNotification(asset('storage/'.$excel_path)));

            unlink (public_path('storage/'.$excel_path));
            $message = 'Excel Exported Successfully, please check your mailbox';

        }

        $work_schedules = WorkSchedule::filter($request->all(), WorkScheduleFilter::class)
            ->where('user_id', \Auth::id())
            ->groupBy('work_schedules.date')
            ->select('work_schedules.date','work_schedules.id','work_schedules.service_id', 'work_schedules.branch_id')
            ->with(['daySchedules' => function ($q) {

                $institute_ids = \Auth::user()->institute_ids;
                $q->whereIn('institute_id', $institute_ids)
                    ->select([
                        'work_schedules.date',
                        'work_schedules.id',
                        'work_schedules.start_time',
                        'work_schedules.end_time',
                        'work_schedules.user_id',
                        'work_schedules.service_id',
                        'work_schedules.branch_id'
                    ])->with(['user' =>  function ($q) {

                        $q->select([
                            'users.id',
                            'users.name',
                            'users.name_at_work',
                            'users.employee_id',
                            'users.profile_pic_id',
                            'users.profession_id'
                        ])->with(['profileImage', 'profession' => function ($q) {
                             $q->select('id', 'name', 'profession_category_id')
                                ->with(['category' => function ($q){
                                    $q->select('id', 'name');
                                }]);
                        }]);

                    }, 'service' => function ($q) {
                        $q->select('id', 'name');
                    }, 'branch' => function ($q) {

                        $q->select('id', 'name', 'address');
                    }]);
            }]);

        $work_schedules = $work_schedules->get()->makeHidden('daySchedules');

        foreach($work_schedules as $work_schedule) {

            $daySchedules = $work_schedule->daySchedules->groupBy(function($q) {
                return $q->branch_id . '_' . $q->service_id . '_' . $q->start_time;
            })->values()->map(function($q) {


                 $users = $q->pluck('user');
                 $info = $q[0]->only(['date','id','start_time', 'end_time', 'service', 'branch']);

                 return [
                     'info' =>$info,
                     'users' => $users
                 ];
            });

            $work_schedule->date_schedules =  $daySchedules;
        }

            return $this->setData($work_schedules)
            ->setMessage($message)
            ->response();
    }

    /**
     * To store the user work schedule of a date
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'institute_id' => 'required',
            'branch_id' => 'required',
            'service_id' => 'required',
            'date' => 'required|date|date_format:Y-m-d',
            'times' => 'required|array',
            'user_id' => 'required'
        ]);

        app('permission')->throwExceptionUpdatingOtherInstitue($request->institute_id);

        $start_time = $request->times[0];
        $end_time = $request->times[1];

        $work_schedule = \App\Lib\SgApp::haveWorkSchedule($request->user_id, $request->date, $start_time, $end_time);

        if($work_schedule) {

            return $this->setData(['work_schedule' => $work_schedule])
                ->setErrorCode('already_engaged')
                ->setMessage('User is already engaged for selected date & time.')
                ->response(422);
        }

        $work_schedule = WorkSchedule::create([
            'institute_id' => $request->institute_id,
            'branch_id' => $request->branch_id,
            'service_id' => $request->service_id,
            'date' => $request->date,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'user_id' => $request->user_id,
            'created_by' => auth()->id()
        ]);

        $work_schedule->user = \App\Models\User::where('id', $request->user_id)->first([
            'id',
            'name'
        ]);

        event(new RosterCreatedEvent($work_schedule));

        return $this->setData(['work_schedule' => $work_schedule])
                ->setMessage('user schedule has been set.')
                ->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work_schedule =  WorkSchedule::findOrFail($id);

        #check permission
        app('permission')->throwExceptionUpdatingOtherInstitue($work_schedule->institute_id);

        $work_schedule->delete();

        event(new RosterDeletedEvent($work_schedule));

        $this->setData([
            'work_schedule' => $work_schedule
        ])
        ->setMessage('Schedule has been deleted successfully.')
        ->response();
    }
}
