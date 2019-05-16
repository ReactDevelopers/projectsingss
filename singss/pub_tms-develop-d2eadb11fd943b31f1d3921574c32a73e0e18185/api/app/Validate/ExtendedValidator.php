<?php 

namespace App\Validate;
 
use Illuminate\Validation\Validator;
 
class ExtendedValidator extends Validator {
 	
    /**
     * Validate for date shuold after the given input date
     * @param  string $attribute  element name
     * @param  string $value      Date
     * @param  array $parameters 
     * @return boolen 
     */
    protected function validateInArrAfterDate($attribute, $value, $parameters){

        $this->requireParameterCount(1, $parameters, 'in_arr_after_date');
        preg_match_all('/(?<=\.)[0-9]+/',$attribute,$indexs);
        $indexs = isset($indexs[0]) ? $indexs[0] : [];

        $anotherElement = $parameters[0];
        $anotherElement = str_replace_array('*',$indexs,$anotherElement);
        $anotherValue = $this->getValue($anotherElement);
        $anotherDate = \Carbon\Carbon::parse($anotherValue);
        $date = \Carbon\Carbon::parse($value);
        return ($anotherDate->diffInMinutes($date,false) >1);

    }

    /**
     * Validate for date shuold before the given input date
     * @param  string $attribute  element name
     * @param  string $value      Date
     * @param  array $parameters 
     * @return boolen 
     */
    protected function validateInArrBeforeDate($attribute, $value, $parameters){

        $this->requireParameterCount(1, $parameters, 'in_arr_before_date');
        preg_match_all('/(?<=\.)[0-9]+/',$attribute,$indexs);
        $indexs = isset($indexs[0]) ? $indexs[0] : [];

        $anotherElement = $parameters[0];
        $anotherElement = str_replace_array('*',$indexs,$anotherElement);

        $anotherValue = $this->getValue($anotherElement);
        $anotherDate = \Carbon\Carbon::parse($anotherValue);
        $date = \Carbon\Carbon::parse($value);
        return ($anotherDate->diffInMinutes($date,false) < 0);
    }
    /**
     * Here, we are validateing the selected start and end date, the date should not exists in array when type is 
     *  Consecutive
     * @param  [type] $attribute  [description]
     * @param  [type] $value      [description]
     * @param  [type] $parameters [description]
     * @return [type]             [description]
     */
    protected function validateDateShouldNotRepeatInArray($attribute, $value, $parameters){

        $this->requireParameterCount(2, $parameters, 'date_should_not_repeat_in_array');
        $date = \Carbon\Carbon::parse($value);

        # getting the array indexs from the attributes
        preg_match_all('/(?<=\.)[0-9]+/',$attribute,$indexs);
        $indexs = isset($indexs[0]) ? $indexs[0] : [];
        $current_index = isset($indexs[1]) ? $indexs[1] :0;

        $course_run_type = $parameters[0];
        $date_range = $parameters[1];
        $course_run_type = str_replace_array('*', $indexs, $course_run_type);
        $date_range = str_replace_array('*', $indexs, $date_range);

        $course_run_type = $this->getValue($course_run_type);
        $date_range = $this->getValue($date_range);

        # removing the current index from the date range
        unset($date_range[$current_index]);

        if( count($date_range) >0 && $course_run_type == 'Consecutive' ) {

            $is_exists = false;
            array_walk($date_range, function($dates, $index) use(&$is_exists, $date ) {

              $star_date = strtotime(\Carbon\Carbon::parse($dates['start_date'])->format('Y-m-d'));  
              $end_date = strtotime(\Carbon\Carbon::parse($dates['end_date'])->format('Y-m-d'));
              $date = strtotime($date->format('Y-m-d'));

              $is_between = ($date >= $star_date && $date <= $end_date)?true:false;
              if($is_exists ==false) {
               $is_exists = $is_between;
              }

            });

            return $is_exists ? false: true;
        }

        return true;
    }
    
}