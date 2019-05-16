<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class AssignmentTiming extends Model
{
    use  Filterable;
    
   	protected $fillable =[
		'assignment_id',
		'date',
		'start_time',
		'end_time'
   	]; 
   	protected $appends = [
        "times"
    ];

   	public function assignment(){
        return $this->belongsTo(Assignment::class, 'assignment_id','id');
    }

    /***
     * return only mobile number
     */
    protected function getTimesAttribute(){
        return [$this->start_time,$this->end_time];
    }


}
