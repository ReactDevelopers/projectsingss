<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RunningCourseBooking;
use DB;

class RunningCourseBookingController extends Controller {

	 /**
     * Getting Running Course list from the database.
     * @param  Request $request [description]
     * @return Instance of Response
     */
    public function index(Request $request)
    {
       $running_course_booking = RunningCourseBooking::select(
            'running_course_booking.id',
            'running_courses.id as running_course_id',
            'courses.category',
            'running_course_booking.status',
            'courses.title',
            'courses.target_group',
            'courses.duration',
            'running_courses.available_slots',
            'running_courses.closing_date',
            'running_courses.assessment_end_date',
            'users.name as officer_name',
            'running_course_booking.assessment_result',
            'departments.name as department_name',
            'supervisor.name as supervisor_name',
            'running_course_booking.is_trainer'
       		)
            ->join('running_courses','running_courses.id','=','running_course_booking.running_course_id')
            ->join('courses','courses.id','=','running_courses.course_id')
            ->join('users','users.id','=','running_course_booking.approver_id')
            ->join('users as supervisor','supervisor.id','=','running_course_booking.user_id')
            ->join('departments','departments.id','=','users.department_id')
            ->join('running_course_dates','running_course_dates.running_course_id','=','running_courses.id')
       		->with('dates');

       if($request->has('searchdata') && $request->searchdata ){

            $running_course_booking->where(function($q) use($request){
                $q->orWhere('courses.title','LIKE',"%{$request->searchdata}%");
                $q->orWhere('running_course_booking.status','LIKE',"%{$request->searchdata}%");
                $q->orWhere('departments.name','LIKE',"%{$request->searchdata}%");
                $q->orWhere('supervisor.name','LIKE',"%{$request->searchdata}%");
                $q->orWhere('users.name','LIKE',"%{$request->searchdata}%");
            });
        }

        switch ($request->sortName) {
            
            case 'status':
                $running_course_booking->orderBy('running_course_booking.status',$request->sortOrder);
                break;
            case 'title':
                $running_course_booking->orderBy('courses.title',$request->sortOrder);
                break; 
            case 'officer_name':
                $running_course_booking->orderBy('users.name',$request->sortOrder);
                break; 
            case 'start_date':
                $running_course_booking->orderBy('running_course_dates.start_date',$request->sortOrder);
                break;
            case 'end_date':
                $running_course_booking->orderBy('running_course_dates.end_date',$request->sortOrder);
                break;   
            case 'assessment_result':
                $running_course_booking->orderBy('running_course_booking.assessment_result',$request->sortOrder);
                break;   
            case 'department_name':
                $running_course_booking->orderBy('departments.name',$request->sortOrder);
                break; 
            case 'supervisor_name':
                $running_course_booking->orderBy('supervisor.name',$request->sortOrder);
                break;
            case 'officer_type':
                $running_course_booking->orderBy('running_course_booking.is_trainer',$request->sortOrder);
                break;         
            
            default:
                # code...
                break;
        }

        $running_course_booking = $running_course_booking->paginate($request->sizePerPage);
        $this->data = $running_course_booking;
        return $this->response();        
    }

    /**
     * Getting the Running Course information by running course id
     * @param  Request $request [description]
     * @param  [type]  $running_course_id [description]
     * @return Json
     */
    public function get(Request $request,$running_course_id)
    {
         $this->data['running_course'] = \App\Models\Course::with('dates')->find($running_course_id);
         return $this->response();
    }

    /**
     * Updating the Running Course information.
     * @param  Request $request [description]
     * @param  [number]  $running_course_id 
     * @return [Json] 
     */
    public function update(Request $request, $running_course_id)
    {

    }

    /**
     * handling the Running couse create request
     * @param  Request $request 
     * @return Json         
     */
    public function store(Request $request) {
        $validator = $this->validateRequest($request);

        if($validator->fails()) {

            $this->status = false;
            $this->message = 'Please enter the valid details.';
            $this->errors = $validator->errors();

        }else{

            try{

                DB::beginTransaction();

                foreach ($request->running_courses as $running_course) {
                   
                   $data =  [];     

                   $data['course_id'] = $request->course['course_id'];
                   $data['available_slots'] = $running_course['available_slots'];
                   $data['course_run_type'] = $running_course['course_run_type'];
                   $data['assessment_start_date'] = $running_course['assessment_start_date'];
                   $data['assessment_end_date'] = $running_course['assessment_end_date'];
                   $data['vendor'] = $request->course['vendor'] ? $request->course['vendor'] :'';
                   $data['remarks'] = '';
                   $data['special_requirement'] = '';
                   $data['closing_date'] = $running_course['closing_date'];

                   $rc = RunningCourse::create($data);
                   $session_dates = [];

                   foreach ($running_course['dates'] as $date ) {
                        
                        $session_dates[] =  [

                            'running_course_id'=>$rc->id,
                            'start_date'=>$date['start_date'],
                            'end_date'=>$date['end_date'],
                        ];    
                   }

                   RunningCourseDate::insert($session_dates);           
                }

                DB::commit();

                $this->message = 'Running course(s) has been created successfully.';
                $this->status = true;
                $this->data = [];

            }catch(\Exception $e){

                DB::rollBack();
                $this->message = $e->getMessage();
                $this->status = false;
            }
        }

        return $this->response();
    }

    /**
     * Validate the Running Course create/update request
     * @param  Request $request [description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    private function validateRequest(Request $request, $id=null) {

       return  \Validator::make($request->all(),[
            'course.category'=>'required',
            'course.course_id' =>'required|integer',
            'course.target_group'=>'max:255',
            'course.vendor'=>'nullable|string',
            'running_courses.*.dates'=>'required|array',
            'running_courses.*.dates.*.start_date'=>'required|date|date_should_not_repeat_in_array:running_courses.*.course_run_type,running_courses.*.dates',
            'running_courses.*.dates.*.end_date'=>'required|date|in_arr_after_date:running_courses.*.dates.*.start_date|date_should_not_repeat_in_array:running_courses.*.course_run_type,running_courses.*.dates',
            'running_courses.*.course_run_type'=>'required',
            'running_courses.*.available_slots'=>'required|integer|min:1',            
            'running_courses.*.closing_date'=>'required|date|in_arr_before_date:running_courses.*.dates.0.start_date',            
            'running_courses.*.assessment_start_date'=>'date',            
            'running_courses.*.assessment_end_date'=>'date|in_arr_after_date:running_courses.*.assessment_start_date',           
        ]);     


    }

     /**
     * This function uses to update the running course status as deleted
     * @param  Request $request [description]
     * @param  [type]  $running_course_id [description]
     * @return [type]           [description]
     */ 
    public function delete(Request $request,$running_course_id)
    {
        $this->message = 'Running Course has been deleted successfully.';
        RunningCourse::find($running_course_id)->delete();
        return $this->response();
    }
    
    /**
     * This function uses on the create running course page, when need to get the course of selected catgeory
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getCourseByCategory(Request $request){

      $courses = Course::where('category',$request->category)
        ->get(['title as label','id as value', 'target_group']);
      $this->data = $courses;

      return $this->response();
    }
}