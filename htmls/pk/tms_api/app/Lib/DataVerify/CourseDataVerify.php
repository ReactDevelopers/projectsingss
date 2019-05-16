<?php
namespace App\Lib\DataVerify;

use Validator;
use App\Models\ProgrammeCategory;
use App\Models\ProgrammeType;
use App\Models\TrainingLocation;
use App\Models\AssessmentType;
use App\Models\Department;

class CourseDataVerify extends DataHelper {

    protected $cellNameToDbCol = [
        'course_code' => 'course_code',
        'course_title' => 'title',
        'duration_no_of_days' =>'duration_in_days',
        'mandatory_yn' => 'mandatory',
        'delivery_method' => 'delivery_method',
        'cost_per_pax' => 'cost_per_pax',
        'grantsubsidy_yn' => 'subsidy',
        'vendor_contactemail_account' => 'vendor_email',
        'if_yes_provide_value' => 'subsidy_value',
        'course_provider' => 'course_provider',
    ];

    protected $defaultValues = [
        'grantsubsidy_yn' => 'No',
        'mandatory_yn' => 'Yes'
    ];
    

    public function __construct(Array $data) {

        parent::__construct($data);

        $this->validator()
            ->findCategory()
            ->findProgrammeType()
            //->findCourseProvider()
            ->findTrainingLocation()
            ->findAssessmentType()
            ->findDepartment();
    }

    /**
     * Validate the Course Data
     */
    protected function validator() {
        
        $original = $this->data['original'];

        $validate = Validator::make($original, [
            'course_code' => 'required|max:20|regex:/[a-z0-9]+$/i',
            'course_title' => 'required|max:255',
            'duration_no_of_days' => 'required|numeric|max:999',
            'programme_category' => 'required',
            'programme_type' => 'required',
            //'dept_competency_level_if_applicable'=>'nullable',
            'mandatory_yn' => 'required|in_enum:Yes,Yes by law,No',
            'delivery_method' =>'nullable|max:255',
            'training_location' => 'required',
            'course_provider' =>'required|max:255',
            'cost_per_pax' => ['nullable','regex:/^\d{0,6}(\.\d{1,2})?$/'],
            'grantsubsidy_yn'=> 'nullable|in_enum:Yes,No',
            'if_yes_provide_value' => ['nullable','required_if:grantsubsidy_yn,Yes,yes,YES','regex:/^\d{0,6}(\.\d{1,2})?$/'],
            'vendor_contactemail_account'=> 'nullable|max:255'
        ],[
            'cost_per_pax.required' => 'Cost Per Pax is required.',
            'cost_per_pax.regex' => 'Cost Per Pax should not be greater than 999999.99',
            'if_yes_provide_value.regex' => '"If Yes Provide Value" should not be greater than 999999.99',
            'if_yes_provide_value.required_if' => '"If Yes Provide Value"  is required if Grant Subsidy value is "Yes"',
            'vendor_contactemail_account.max' => 'Vendor Contact/Email Account may not be greater than 255 characters.',
            'grantsubsidy_yn.in_enum' => 'Grant Subsidy Value can be Yes or No only.',
            "course_provider" => 'Course provider is required.',
            'training_location' => 'Training Location is required.',
            'delivery_method'=> 'Delivery Method is required.',
            'mandatory_yn.in_enum'=> 'Mandatory value can be Yes or No only.',
            'programme_type.required' => 'Programme Type is required.',
            'programme_category.required' => 'Programme Category is required.',
            'duration_no_of_days.required' => 'Duration is required.',
            'duration_no_of_days.numeric' => 'Duration value should only be a number.',
            'duration_no_of_days.max'=>'Duration value should not be greater than 999.',
            'course_title.required' => 'Course Title is required.',
            'course_title.max' => 'Course Title may not be greater than 255 characters.',
            'course_code.required' => 'Course Code is required.',
            'course_code.regex' => 'Course Code must only be contain the alphabets or numbers.',
            'course_code.max' => 'Course Title may not be greater than 20 characters.',
        ]);
        
        $grantsubsidy_yn  = isset($original['grantsubsidy_yn']) ? $original['grantsubsidy_yn'] : null;
        $if_yes_provide_value  =  isset($original['if_yes_provide_value']) ? $original['if_yes_provide_value'] : null;
        $cost_per_pax = isset($original['cost_per_pax']) && $original['cost_per_pax'] ? $original['cost_per_pax'] : null;

        $validate->after(function($validator) use($grantsubsidy_yn, $if_yes_provide_value, $cost_per_pax) {
            
            if($grantsubsidy_yn == 'No' && $if_yes_provide_value && $if_yes_provide_value > 0 ){
                
                $validator->errors()->add('if_yes_provide_value', '"If Yes Provide Value" value should be empty in case of Subsidy not granted.');
            }

            if($if_yes_provide_value && $cost_per_pax && round($if_yes_provide_value,2) > round($cost_per_pax, 2) ) {

                $validator->errors()->add('if_yes_provide_value', '"If Yes Provide Value" should be less or equal to Cost Per Pax.');  
            }
        });

        $this->validate = $validate;

        return $this;
    }

    /**
     * Find Programme Category in database
     */
    private function findCategory() {
        return $this->findInDB(
            ProgrammeCategory::getCached(), 
            'programme_category', 
            ['prog_category_code', 'prog_category_name'], 
            'programme_category_id', 
            'Programme Category name does not match in database.'
        );
    }

    /**
     * Find Department in database
     */
    private function findDepartment() {
        return $this->findInDB(
            Department::getCached(), 
            'dept_competency_level_if_applicable', 
            ['dept_code', 'dept_name'], 
            'department_id', 
            'Department does not match in database.'
        );
    }

    /**
     * Find Programme Type in Database
     */
    private function findProgrammeType() {

        return $this->findInDB(
            ProgrammeType::getCached(),
            'programme_type',
            ['prog_type_code', 'prog_type_name'],
            'programme_type_id',
            'Programme Type does not match in database.'
        );
        
    }

    /**
     * Find Training Location in Database 
     */
    private function findTrainingLocation() {

        return $this->findInDB(
            TrainingLocation::getCached(),
            'training_location',
            ['location'],
            'training_location_id',
            'Training Location does not match in database.'
        );
    }
    
     /**
     * Find Training Location in Database 
     */
    // private function findCourseProvider() {

    //     return $this->findInDB(
    //         CourseProvider::getCached(),
    //         'course_provider',
    //         ['provider_name'],
    //         'course_provider_id',
    //         'Course Provider does not match in database.'
    //     );
    // }

    private function findAssessmentType() {

        return $this->findInDB(
            AssessmentType::getCached(),
            'assessment_type',
            ['assessment_type_name'],
            'assessment_type_id',
            'Assessment Type  does not match in database.'
        );
    }

    /**
     * Translate mandatory_yn value according to database Enum Collection
     */
    protected function afterSuccessCallBack() {
        
        

        $mandatory_yn = strtolower(isset($this->data['original']['mandatory_yn']) ? $this->data['original']['mandatory_yn'] : '');
        $grantsubsidy_yn = strtolower(isset($this->data['original']['grantsubsidy_yn']) ? $this->data['original']['grantsubsidy_yn'] : '');
        
        if( $mandatory_yn ) {

            switch ($mandatory_yn) {
                case 'yes':
                    
                    $this->data['translate'][$this->cellNameToDbCol['mandatory_yn']] = 'Yes';
                    break;
                case 'no':
                    $this->data['translate'][$this->cellNameToDbCol['mandatory_yn']] = 'No';
                    break;
                
                case 'yes by law':
                    $this->data['translate'][$this->cellNameToDbCol['mandatory_yn']] = 'Yes by law';
                    break;

                default:
                    # code...
                    break;
            }
        }

        if( $grantsubsidy_yn ) {

            switch ($grantsubsidy_yn) {
                case 'yes':
                    $this->data['translate'][$this->cellNameToDbCol['grantsubsidy_yn']] = 'Yes';
                    break;
                case 'no':
                    $this->data['translate'][$this->cellNameToDbCol['grantsubsidy_yn']] = 'No';
                    break;

                default:
                    # code...
                    break;
            }
        }
    }
}