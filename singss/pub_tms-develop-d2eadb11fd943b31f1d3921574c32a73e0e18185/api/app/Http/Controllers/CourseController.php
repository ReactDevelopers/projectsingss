<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller {

    /**
     * Getting Course list from the database.
     * @param  Request $request [description]
     * @return Instance of Response
     */
    public function index(Request $request)
    {
       $courses = \App\Models\Course::select('id','website','category','title','target_group','duration');

       if($request->has('searchdata') && $request->searchdata ) {

            $courses->where(function($q) use($request){
                $q->orWhere('courses.website','LIKE',"%{$request->searchdata}%");
                $q->orWhere('courses.category','LIKE',"%{$request->searchdata}%");
                $q->orWhere('courses.title','LIKE',"%{$request->searchdata}%");
                $q->orWhere('courses.target_group','LIKE',"%{$request->searchdata}%");
                $q->orWhere('courses.duration','LIKE',"%{$request->searchdata}%");
            });
        }

        switch ($request->sortName) {
            
            case 'category':
                $courses->orderBy('courses.category',$request->sortOrder);
                break;
            case 'title':
                $courses->orderBy('courses.title',$request->sortOrder);
                break; 
            case 'duration':
                $courses->orderBy('courses.duration',$request->sortOrder);
                break; 
            case 'target_group':
                $courses->orderBy('courses.target_group',$request->sortOrder);
            case 'website':
                $courses->orderBy('courses.website',$request->sortOrder);
                break;           
            
            default:
                # code...
                break;
        }

        $courses = $courses->paginate($request->sizePerPage);
        $this->data = $courses;
        return $this->response();        
    }

    /**
     * Getting the Course information by course id
     * @param  Request $request [description]
     * @param  [type]  $course_id [description]
     * @return Json
     */
    public function get(Request $request,$course_id)
    {
         $this->data['course'] = \App\Models\Course::find($course_id);
         return $this->response();
    }

    /**
     * Updating the Course information.
     * @param  Request $request [description]
     * @param  [number]  $course_id 
     * @return [Json] 
     */
    public function update(Request $request, $course_id)
    {
        $validator = $this->validateRequest($request,$course_id);
        if($validator->fails()) {

            $this->status = false;
            $this->message = 'Please enter the valid details.';
            $this->errors = $validator->errors();

        }else{

            $this->message = 'Course has been Updated successfully.';
            $course_data = $request->only(['category','description','remark','target_group','title','website']);
             $course_data['duration'] = ($request->duration_in_day*24)+ ($request->has('duration_in_hour')?$request->duration_in_hour:0);
            \App\Models\Course::find($course_id)->update($course_data);
        }

        return $this->response();
    }

    /**
     * handling the couse create request
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

            $this->message = 'Course has been created successfully.';
            $course_data = $request->only(['category','description','remark','target_group','title','website']);

            $course_data['duration'] = ($request->duration_in_day*24)+ ($request->has('duration_in_hour')?$request->duration_in_hour:0);
            $course_data['special_requirement'] = '';
            $course_data['pre_requisite'] = '';

            \App\Models\Course::create($course_data);
        }

        return $this->response();
    }
    /**
     * Validate the Course create/update request
     * @param  Request $request [description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    private function validateRequest(Request $request, $id=null) {

        return  \Validator::make($request->all(),[
            'title'=>'required|max:255|unique:courses,title,'.$id,
            'description' =>'string',
            'target_group'=>'required|max:255',
            'duration_in_day'=>'required|integer',
            'duration_in_hour'=>'integer|max:23',
            'website'=>'max:255|active_url',
            'category'=>'required',
            'remark'=>'max:800'
        ]);
    }

    /**
     * This function uses to update the course status as deleted
     * @param  Request $request [description]
     * @param  [type]  $course_id [description]
     * @return [type]           [description]
     */ 
    public function delete(Request $request,$course_id)
    {
        
        $this->message = 'Course has been deleted successfully.';
        \App\Models\Course::find($course_id)->delete();
        return $this->response();
    }

}
