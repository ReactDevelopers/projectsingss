<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'subscribe';
    protected $guarded = ['id'];
}
