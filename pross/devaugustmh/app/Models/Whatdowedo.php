<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Whatdowedo extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'what_do_we_do';
    protected $guarded = ['id'];
}
