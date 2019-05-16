<?php

namespace App\Http\Controllers\Api\Sections\Roster;

use App\Models\Institite;
use Illuminate\Http\Request;
use App\Models\WorkAutoSchedule;
use App\Http\Controllers\Controller;
use App\Models\ScheduledDayInformation;
use Carbon\Carbon;

class RosterActionController extends Controller
{
    /**
     * To get given institute Schedule information of the given month.
     */
    public function getMonthScheduledInfomation(Request $request)  {

    	$this->validate($request, [
    		'institute_id' => 'required',
    		'month' => 'required|date_format:Y-m'
        ]);

        #check permission
        app('permission')->throwExceptionUpdatingOtherInstitue($request->institute_id);

    	$day_info = ScheduledDayInformation::whereRaw("DATE_FORMAT(date, '%Y-%m') = '{$request->month}'")
    		->where('institute_id', $request->institute_id);

    	$day_info = $day_info->get()->groupBy( function ($info){

    		return '_'.$info->branch_id;

    	})->map( function($branch_schedules) {

    		$branch_schedules->groupBy(function ($branch_schedule) {

    			return '_'.$branch_schedule->service_id;
    		});
    	});

    	return $this->setData([
    		'data' => ['data' => $day_info]
    	])
    	->response();
    }

	/**
	 * To add the comment on scheduled day,
	 * Scheduled comment will be uniqued based on institute_id, branch_id, service_id, and
	 * date
	 */
    public function createScheduledDayComment (Request $request) {

    	$this->validate($request, [
    		'institute_id' => 'required',
    		'branch_id' => 'required',
    		'service_id' => 'required',
    		'date' => 'required|date|date_format:Y-m-d',
    		'comments' => 'nullable|string|max:255'
        ]);

        #check permission
        app('permission')->throwExceptionUpdatingOtherInstitue($request->institute_id);

    	$day_info = ScheduledDayInformation::updateOrCreate([
    		'institute_id' => $request->institute_id,
			'branch_id' => $request->branch_id,
			'service_id' => $request->service_id,
			'date' => $request->date
    	],[

    		'comments' => $request->comments ? $request->comments : ''
    	]);

    	return $this->setData([
	    		'scheduled_day_info' => $day_info
	    	])
	    	->response();
    }

    /**
     * To get Auti Scheduke List on bases of given institute and Month
     */
    public function getAutoScheduleList (Request $request) {

    	$this->validate($request, [
    		'institute_id' => 'required',
    		'month' => 'required|date_format:Y-m'
        ]);

        #check permission
        app('permission')->throwExceptionUpdatingOtherInstitue($request->institute_id);

    	$schedules = WorkAutoSchedule::where([
	    		'institute_id' => $request->institute_id
	    	])
	    	->whereRaw("DATE_FORMAT(schedule_start_date, '%Y-%m') = '{$request->month}'")
	    ->get();

	    $schedules = $schedules->groupBy( function ($info){

    		return '_'.$info->branch_id;

    	})->map( function($branch_schedules) {

    		$branch_schedules->groupBy(function ($branch_schedule) {

    			return '_'.$branch_schedule->service_id;
    		});
    	});

    	return $this->setData([
    		'data' => ['data' => $schedules]
    	])
    	->response();

    }
    /**
     * To Store the auto schedule data into dataBase
     */
    public function createAutoSchedule(Request $request) {

    	$this->validate($request, [
    		'institute_id' => 'required',
    		'branch_id' => 'required',
    		'service_id' => 'required',
    		'user_id' => 'required',
    		'schedule_type' => 'required|in:weekly,daily',
    		'schedule_start_date' => 'required|date|date_format:Y-m-d',
    		'scheduled_till_date' => 'nullable|date|date_format:Y-m-d|after:schedule_start_date',
    		'status' => 'required|in:Pending,Active',
    		'options.week_days' => 'required_if:schedule_type,weekly|Array',
    		'options.overwrite_current_schedule' => 'required|string|in:Yes,No'
        ]);
        #check permission
        app('permission')->throwExceptionUpdatingOtherInstitue($request->institute_id);

        $base_data = [
            'institute_id' => $request->institute_id,
            'branch_id' => $request->branch_id,
    		'service_id' => $request->service_id,
    		'user_id' => $request->user_id
    	];

    	$auto_schedule = WorkAutoSchedule::where($base_data)->first();

    	if($auto_schedule) {

    		return $this->setData([
    			'auto_schedule' => $auto_schedule
    		])
    		->setErrorCode('already_scheduled')
    		->response(422);
        }

        $schedule_start_date_subtract_30_day = Carbon::parse($request->schedule_start_date)->subDays(30);
        $auto_schedule_next_date = $schedule_start_date_subtract_30_day->isFuture() ? $schedule_start_date_subtract_30_day->format('Y-m-d') : date('Y-m-d');

    	$auto_schedule = WorkAutoSchedule::create(array_merge($base_data, [
    		'schedule_type' => $request->schedule_type,
    		'schedule_start_date' => $request->schedule_start_date,
    		'scheduled_till_date' => $request->scheduled_till_date,
            'status' => $request->status,
            'auto_schedule_next_date' => $auto_schedule_next_date,
    		'options' => $request->options,
        ]));
        $auto_schedule->user = \App\Models\User::where('id', $request->user_id)->first([
            'id',
            'name'
        ]);

    	return $this->setData([
			'auto_schedule' => $auto_schedule
		])
		->setMessage('Auto Schedule has been created successfully.')
		->response();

    }

    /**
     * To Delete the auto schedule
     */

    public function deleteAutoSchedule(Request $request, $id) {

        $auto_schedule = WorkAutoSchedule::findOrFail($id);
        #check permission
        app('permission')->throwExceptionUpdatingOtherInstitue($auto_schedule->institute_id);

        $auto_schedule->delete();

        return $this->setData([
			'auto_schedule' => $auto_schedule
		])
		->setMessage('Auto Schedule has been deleted successfully.')
		->response();
    }
}
