<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'teams';
    protected $guarded = ['id'];
    public $timestamps = true;
}
