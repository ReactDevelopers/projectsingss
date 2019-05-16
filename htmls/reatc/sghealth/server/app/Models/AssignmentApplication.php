<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class AssignmentApplication extends Model
{
    use  Filterable;
		
		protected $table = "assignment_application";
		
    protected $fillable =[
		'institute_id',
		'assignment_id',
		'user_id',
		'status'
	 ]; 
	 public function user(){
		 return $this->belongsTo(User::class,'user_id','id')->with(['institute','profession']);
	 }
}
