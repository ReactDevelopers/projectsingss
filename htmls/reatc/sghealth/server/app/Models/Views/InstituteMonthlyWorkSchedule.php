<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;


class InstituteMonthlyWorkSchedule extends Model
{

    use Filterable;

    public $appends = [
        'format_date'
        
    ];
    //
    public function institute(){
        return $this->hasOne(\App\Models\Institute::class,'id','institute_id');
    }

    public function user(){
        return $this->hasOne(\App\Models\User::class,'id','user_id');
    }

    public function getFormatDateAttribute(){
        return date('Y-m',strtotime($this->date));
    }
}
