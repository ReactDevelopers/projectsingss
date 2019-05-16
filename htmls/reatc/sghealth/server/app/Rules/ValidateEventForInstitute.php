<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Event;

class ValidateEventForInstitute implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $request;

    public function __construct($request)
    {
        $this->request = $request->all();
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
        $event_start_time = date('H:i:s',strtotime($this->request['event_start_time']));
        $event_end_time = date('H:i:s',strtotime($this->request['event_end_time']));

        $hasEvent = Event::where(['institute_id'=>$value,'event_date'=>$this->request['event_date']])
            ->whereBetween('event_start_time',[$event_start_time,$event_end_time])
            ->OrWhereBetween('event_end_time',[$event_start_time,$event_end_time])
            ->count();

        if($hasEvent > 0){
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
        return 'The institute has already an event for selected date and time';
    }
}
