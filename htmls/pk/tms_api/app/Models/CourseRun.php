<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Lib\BulkDataQuery;
use \Illuminate\Database\Eloquent\SoftDeletes;

class CourseRun extends Model {
    
    use BulkDataQuery, SoftDeletes;   
    protected $fillable = [
        'current_status','should_check_deconflict','id','course_code','start_date','end_date','assessment_start_date','assessment_end_date'
    ];
}