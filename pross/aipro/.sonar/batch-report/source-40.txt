<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'key';

    public static function getValue($key)
    {
    	return self::select(['value'])->where(['key'=>$key])->first();
    }
}
