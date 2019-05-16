<?php

use Illuminate\Database\Seeder;

class CourseAttendee extends Seeder
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

        $data = \DB::connection('mysql_old')->table('courseattendance')
        		->join(
        			\DB::raw("{$new_db_name}.users as new_users"),
        			\DB::raw('new_users.pubnet_id'),
        			\DB::raw("="),
        			\DB::raw("CAST( {$old_db_prefix}courseattendance.Persnum AS unsigned)")
        			)
        		->join(
			 	\DB::raw("{$new_db_name}.running_courses as new_courserun"),
			 	\DB::raw("new_courserun.old_db_primary_key"),
			 	\DB::raw("="),
			 	'courseattendance.CourseRunningId'
			 	)
			 	->select(
			 		\DB::raw('new_courserun.id as running_course_id'),
			 		\DB::raw('new_users.id as user_id'),
			 		'StartDate as start_time',
			 		'EndDate as end_time',
			 		'Result as result',
			 		\DB::raw('IF(DeletedStatus =0,null, CURRENT_DATE() ) as deleted_at'),
		    		'AddedDate as created_at',
		    		'LastUpdatedDate as updated_at',
		    		'AssessmentResult as assessment_result'
			 	)->get();
		$data = json_decode($data->toJson(),true);	
		\App\Models\CourseAttendee::batchInsertIgnore($data);

	}
}
