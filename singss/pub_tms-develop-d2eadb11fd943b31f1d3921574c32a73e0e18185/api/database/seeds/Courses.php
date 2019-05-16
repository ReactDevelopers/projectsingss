<?php

use Illuminate\Database\Seeder;

class Courses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = \DB::connection('mysql_old')->table('course')->select([
        	'Category as category',
            'id as old_db_primary_key',
        	'TargetGroup as target_group',
        	'Title as title',
        	'Description as description',
        	'Website as website',
        	'Remark as remark',
    		\DB::raw('IF(DeletedStatus =0,null, CURRENT_DATE() ) as deleted_at'),
    		'AddedDate as created_at',
    		'LastUpdatedDate as updated_at',
    		'SpecialRequirement as special_requirement',
    		'PreRequisite as pre_requisite',
    		\DB::raw("( (Days*24) + Hours) as duration")
    	])->get();

    	$data = json_decode($data->toJson(),true);

    	\App\Models\Course::insert($data);
    }
}
