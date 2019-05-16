<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkAutoSchedule extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'institute_id',
        'branch_id',
        'service_id',
        'date',
        'user_id',
        'schedule_type',
        'schedule_start_date',
        'scheduled_till_date',
        'auto_schedule_next_date',
        'status',
        'options'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'institute_id' => 'int',
        'branch_id' => 'int',
        'service_id' => 'int',
        'date' => 'int',
        'user_id' => 'int',
        'auto_schedule_next_date' => 'string',
        'schedule_type' => 'string',
        'schedule_start_date' => 'string',
        'scheduled_till_date' => 'string',
        'status' => 'string',
        'options' => 'array'
    ];

    /**
     * Get the Person data whom worked has been scheduled.
     */
    public function user() {

        return $this->belongsTo( User::class );
    }
}
