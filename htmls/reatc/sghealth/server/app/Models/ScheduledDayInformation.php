<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduledDayInformation extends Model
{
    /**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'institute_id',
		'branch_id',
		'service_id',
		'date',
		'comments'
	];

   /**
	* The attributes that should be cast to native types.
	*
	* @var array
	*/
	protected $casts = [
		'institute_id' => 'int',
		'branch_id' => 'int',
		'service_id' => 'int',
		'date' => 'string',
		'comments' => 'string',
		'options' => 'json'
	];
}
