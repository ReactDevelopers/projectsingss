<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class EventBranch extends Model
{
    /**
	* Get event branches
	*/
	public function branch() {

		return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

}
