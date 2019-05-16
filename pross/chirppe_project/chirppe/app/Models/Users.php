<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'firstname','lastname','email','password','remember_token','created_at', 'updated_at'];
    public $timestamps = true;

}
