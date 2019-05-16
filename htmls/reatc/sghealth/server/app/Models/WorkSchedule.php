<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class WorkSchedule extends Model
{
    use Filterable;

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
        'created_by',
        'updated_by',
        'start_time',
        'end_time',
        'work_auto_schedule_id'
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
        'date' => 'string',
        'user_id' => 'int',
        'created_by' => 'int',
        'updated_by' => 'int',
        'work_auto_schedule_id' => 'int',
    ];

    /**
     * Get the Person data whom worked has been scheduled.
     */
    public function user() {

        return $this->belongsTo( User::class );
    }

    public function daySchedules() {

        return $this->hasMany(WorkSchedule::class, 'date', 'date');
    }

    public function service() {

        return $this->belongsTo(Service::class);
    }

    public function institute() {

        return $this->belongsTo(Institute::class);
    }

    public function branch() {

        return $this->belongsTo(Branch::class);
    }
}
