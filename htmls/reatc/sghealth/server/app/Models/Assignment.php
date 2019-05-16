<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class Assignment extends Model
{
    use  Filterable;
    
   	protected $fillable =[
		'institute_id',
		'branch_id',
		'title',
		'description',
		'cost',
		'options',
		'created_by',
		'updated_by'
   ]; 

   	public function assignmentTimings(){
   		return $this->hasMany(AssignmentTiming::class);
    }

   	public function institute(){
        return $this->belongsTo(Institute::class, 'institute_id','id');
	}

	public function branch(){
        return $this->belongsTo(Branch::class, 'branch_id','id');
	}
	
	public function assignmentApplication(){
		return $this->hasMany(AssignmentApplication::class);
	 }
	 
	public function getCostAttribute($val){
		return round($val,false);
	}
}