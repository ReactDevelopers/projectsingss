<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'banners';
    protected $guarded = ['id'];
    public $timestamps = true;
}
