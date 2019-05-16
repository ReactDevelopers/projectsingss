<?php
namespace App\Lib\DataVerify;

use Validator;

class PlacementDataVerify extends DataHelper {
    
    protected $cellNameToDbCol = [
        'course_run_id' => 'course_run_id',
        'per_id'=>'personnel_number',
        'status'=> 'current_status'
    ];    
    
    private $courseRundata = [];
    private $existedPerId = [];
    protected $defaultValues = [
        'status' => 'Draft',
    ];

    public function __construct(Array $data, Array $course_run_data, Array $existed_per_id) {

        parent::__construct($data);
        $this->courseRundata = $course_run_data;
        $this->existedPerId = $existed_per_id;
        $this->validator();
    }

    /**
     * Validate the Create Course Run Data
     */
    protected function validator() {
        
        $original = $this->data['original'];
        $course_run_data  = $this->courseRundata;
        $existed_per_id = $this->existedPerId;

        $this->validate = Validator::make($original, [
            'course_run_id' => 'required|integer',            
            'per_id' => 'required|integer',            
        ],[
            'course_run_id.required' =>'Course run id is required.',
            'course_run_id.integer' =>'Course run id must be a number.',
            'per_id.integer' =>'Per id must be a number.',
            'per_id.required' => 'Per Id is required.',
            //'per_id.in' => 'Per Id does not exists in database'
        ]);

        $this->validate->after(function($validator) use($original, $course_run_data, $existed_per_id) {
           
            if(!empty($original) && isset($original['course_run_id']) && $original['course_run_id'] ){

                $cr = isset($course_run_data[$original['course_run_id']])  ? $course_run_data[$original['course_run_id']][0] : null;

                if(!$cr){
                    
                    $validator->errors()->add('course_run_id', 'Course run does not exists into the database.');
                }
                // else if($cr['current_status'] != 'Confirmed') {

                //     $validator->errors()->add('course_run_id', 'System does not allow to upload placement data if course run status is not Confirmed, the current status is '. $cr['current_status']);
                // }
            }
            
            if( isset($original['per_id']) && $original['per_id'] && !in_array($original['per_id'], $existed_per_id)){

                $validator->errors()->add('per_id', 'Personnel Number does not exist in database.');
            }
        });

        return $this;
    }
    
    
}