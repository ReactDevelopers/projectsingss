<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class License extends Model
{
	use Filterable;

    protected $fillable =[
        'name',
    ];

    public function institutes() {

        return $this->belongsToMany(Institute::class, 'institute_license');
    }
}

