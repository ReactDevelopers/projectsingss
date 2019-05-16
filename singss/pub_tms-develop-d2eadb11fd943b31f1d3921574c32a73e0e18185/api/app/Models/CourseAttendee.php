<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseAttendee extends Model {
	
	use \App\Lib\BulkDataQuery;

    protected $fillable = [
        'running_course_id', 
        'user_id',
        'start_time',
        'end_time',
        'result',
        'assessment_result'
    ];
}