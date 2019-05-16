<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RunningCourseDate extends Model {

    protected $fillable = [
        'running_course_id', 
        'start_date',
        'end_date'
    ];

}