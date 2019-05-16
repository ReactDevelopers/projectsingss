<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'projects';
    protected $guarded = ['id'];
    public $timestamps = true;
}
