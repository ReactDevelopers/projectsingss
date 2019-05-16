<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class EventInstitute extends Model
{
     /**
	* Get event institutes
	*/
	public function institute() {

		return $this->belongsTo(Institute::class, 'institute_id', 'id');
    }
}
