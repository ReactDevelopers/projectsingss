<?php

namespace App\Shared;

use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    protected $table = 'placement';
    protected $primaryKey = 'placement_id';
    const UPDATED_AT = 'created_date';
}
