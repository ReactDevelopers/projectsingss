<?php

use Illuminate\Database\Seeder;

class RunningCourses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collation  = config('database.connections.mysql.collation');
		$charset  = config('database.connections.mysql.charset');
		$new_db_name  = config('database.connections.mysql.database');
		$old_db_name  = config('database.connections.mysql_old.database');
		$old_db_prefix  = config('database.connections.mysql_old.prefix');

		 $data = \DB::connection('mysql_old')->table('courserun')->select([
		 	\DB::raw('CAST(AvailableSlots AS UNSIGNED) as available_slots'),
		 	\DB::raw('IF(Remarks IS NULL,"", Remarks) as remarks'),
		 	\DB::raw('IF(DeletedStatus =0,null, CURRENT_DATE() ) as deleted_at'),
		 	'AddedDate as created_at',
    		'LastUpdatedDate as updated_at',
    		'AssessmentStartDate as assessment_start_date',
    		'AssessmentEndDate as assessment_end_date',
    		\DB::raw('DATE_FORMAT(ClosingDate,"%Y-%m-%d") as closing_date'),
    		\DB::raw('IF(SpecialRequirement IS NULL,"", SpecialRequirement) as special_requirement'),
    		\DB::raw('IF(Vendor IS NULL,"", Vendor) as vendor'),
    		'courserun.id as old_db_primary_key',
    		\DB::raw("new_course.id as course_id"),
    		\DB::raw('If( '.$old_db_prefix.'cmd.Id IS NULL, "Normal","Consecutive") as course_run_type'),
		 ])
		 ->leftJoin('courserunmultipledate as cmd','cmd.courseRunId','=','courserun.id')
		 ->join(
		 	\DB::raw("{$new_db_name}.courses as new_course"),
		 	\DB::raw("new_course.old_db_primary_key"),
		 	\DB::raw("="),
		 	'courserun.CourseId'
		 	)->get();
		 
		 //print_r($data); exit;

		 $data = json_decode($data->toJson(),true);

		 $chunk_data = array_chunk($data, 2000);

		 foreach ($chunk_data as $data_part) {
		 	# code...
		 	\App\Models\RunningCourseDates::insert($data_part);
		 }
    }
}
