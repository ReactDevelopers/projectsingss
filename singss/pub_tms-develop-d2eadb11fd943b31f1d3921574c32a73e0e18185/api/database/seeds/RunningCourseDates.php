<?php

use Illuminate\Database\Seeder;

class RunningCourseDates extends Seeder
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

        // Inserting Normal data 
        $data = \DB::connection('mysql_old')->table('courserun')->select(
        	\DB::raw('new_courserun.id as running_course_id'),
        	'courserun.StartDate as start_date',
        	'courserun.EndDate as end_date'
        	)
        ->join(
		 	\DB::raw("{$new_db_name}.running_courses as new_courserun"),
		 	\DB::raw("new_courserun.old_db_primary_key"),
		 	\DB::raw("="),
		 	'courserun.Id'
		 	)
        ->whereRaw('new_courserun.course_run_type="Normal"')
        ->get();
		
		$data = json_decode($data->toJson(),true);

		$chunk_data = array_chunk($data, 2000);

		foreach ($chunk_data as $data_part) {

			\App\Models\RunningCourseDate::insert($data_part);
		}


		// Inserting Consecutive data 

		$data = \DB::connection('mysql_old')->table('courserunmultipledate')->select(
        	\DB::raw('new_courserun.id as running_course_id'),
        	'courserunmultipledate.StartDate as start_date',
        	'courserunmultipledate.EndDate as end_date'
        	)
        ->join(
		 	\DB::raw("{$new_db_name}.running_courses as new_courserun"),
		 	\DB::raw("new_courserun.old_db_primary_key"),
		 	\DB::raw("="),
		 	'courserunmultipledate.courseRunId'
		 	)
        ->whereRaw('new_courserun.course_run_type="Consecutive"')
        ->get();

		$data = json_decode($data->toJson(),true);

		$chunk_data = array_chunk($data, 2000);

		foreach ($chunk_data as $data_part) {

			\App\Models\RunningCourseDate::insert($data_part);
		}
    }
}
