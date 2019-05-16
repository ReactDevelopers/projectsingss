<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Branch;

class InstituteBranch implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $instituteId = null;
    private $branch = null;

    public function __construct($institute_id)
    {
        $this->instituteId = $institute_id;
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
        if($value) {
                        
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
       if($this->branch && $this->branch->deleted_at ) {
            return trans('branch.deleted');
       }
       else if($this->branch && $this->branch->institute_id != $this->instituteId) {
            return trans('branch.institute_not_same');
       }
       else {
        return trans('branch.invalid');
       }
    }
}
