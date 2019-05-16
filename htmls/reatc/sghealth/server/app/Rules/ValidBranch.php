<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Branch;
use App\Models\Institute;

class ValidBranch implements Rule
{
    protected $institute_ids;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($institute_ids)
    {
        $this->institute_ids = $institute_ids;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if( is_array($value) ) {

            $is_valid_branch = Branch::whereIn('id',$value)->whereIn('institute_id',$this->institute_ids)->count();
            
        }else{
            if(\App\Lib\SgApp::isJson($value)){
                
                $value = json_decode($value);
            }
            
            $is_valid_branch = Branch::where('id',$value)->whereIn('institute_id',$this->institute_ids)->count();

        }

        
        if($is_valid_branch == 0){
            return false;
            
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please choose valid branch.';
    }
}
