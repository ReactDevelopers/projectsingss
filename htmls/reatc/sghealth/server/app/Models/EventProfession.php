<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class EventProfession extends Model
{
         /**
	* Get event institutes
	*/
	public function profession() {

		return $this->belongsTo(ProfessionCategory::class, 'profession_cat_id', 'id');
    }
}
