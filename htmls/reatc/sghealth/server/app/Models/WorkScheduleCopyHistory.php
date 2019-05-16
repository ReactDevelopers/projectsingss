<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkScheduleCopyHistory extends Model
{
    //
    protected $table = "work_schedule_copy_history";

    protected $fillable = [
        'from_month',
        'to_month',
        'institute_id',
        'user_id',
        'old_schedule_data',
        'new_schedule_data',
    ];
    
}
