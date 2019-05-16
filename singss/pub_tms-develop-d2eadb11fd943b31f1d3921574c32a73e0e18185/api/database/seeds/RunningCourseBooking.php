<?php

use Illuminate\Database\Seeder;

class RunningCourseBooking extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $new_db_name  = config('database.connections.mysql.database');
        $old_db_prefix  = config('database.connections.mysql_old.prefix');


        $data = \DB::connection('mysql_old')->table('coursebooking')->select(
        	\DB::raw('new_courserun.id as running_course_id'),
        	'OfficerId as user_id',
        	'ApprovingOfficerId as approver_id',
        	'Status as status',
        	'LastEmailSent as last_email_sent',
        	'AssessmentResult as assessment_result',
        	 DB::raw('IF(IsTrainer = 0,"No","Yes") as is_trainer'),
        	'AddedDate as created_at',
    		'LastUpdatedDate as updated_at',
    		\DB::raw('IF(DeletedStatus =0,null, CURRENT_DATE() ) as deleted_at')
        	)
        ->join(
		 	\DB::raw("{$new_db_name}.running_courses as new_courserun"),
		 	\DB::raw("new_courserun.old_db_primary_key"),
		 	\DB::raw("="),
		 	'coursebooking.CourseRuningId'
		 	)
        ->get();

        $data = json_decode($data->toJson(),true);

		\App\Models\RunningCourseBooking::batchInsertIgnore($data);
    }
}
