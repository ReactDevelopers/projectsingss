<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class UniqueArrayValue implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public function __construct()
    {

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
        /*Get attribute name*/
        $attribute          = explode('.', $attribute);
        
        $attribute_name     = $attribute[0];
        $attribute_index    = $attribute[1];
        $attribute_key      = $attribute[2];

        $branch_arr         = \Request::get($attribute_name);
        $branch_arr         = collect($branch_arr);

        /*getting all values from request except the field in validation*/
        $branch_arr = $branch_arr->filter(function ($value, $index) use($attribute_index){
            return ($index != $attribute_index);
        })->pluck($attribute_key);

        /*validating if the value exist.*/
        $branch_arr = $branch_arr->toArray();
        if(in_array($value, $branch_arr)){
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
        return 'The :attribute code must be unique';
    }
}
