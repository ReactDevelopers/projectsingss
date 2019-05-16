<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RunningCourseBooking extends Model {
	
	use \App\Lib\BulkDataQuery;

	protected $table= 'running_course_booking';
    protected $appends = ['officer_type'];

    protected $fillable = [
        'running_course_id', 
        'user_id',
        'approver_id',
        'status',
        'last_email_sent',
        'assessment_result',
        'is_trainer',
    ];

    function dates(){

        return $this->hasMany('App\Models\RunningCourseDate','running_course_id','running_course_id');
    }

    public function getOfficerTypeAttribute() {

        return (!$this->is_trainer && $this->is_trainer =='No') ? 'Learner' : 'Trainer';
    }

}