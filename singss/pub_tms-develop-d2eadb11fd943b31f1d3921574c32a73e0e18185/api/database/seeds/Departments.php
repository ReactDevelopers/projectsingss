<?php

use Illuminate\Database\Seeder;

class Departments extends Seeder
{
    /**
     * Import the plant list from old database to new database.
     *
     * @return void
     */
    public function run()
    {
		
		$collation  = config('database.connections.mysql.collation');
		$charset  = config('database.connections.mysql.charset');

        $data = \DB::connection('mysql_old')->table('department')->select([
        	'OrgUnit as name',
        	'OrgUnitCode as oganization_code',
    		\DB::raw('IF(DeletedStatus =0,null, CURRENT_DATE() ) as deleted_at'),
    		'AddedDate as created_at',
    		'LastUpdatedDate as updated_at'
    	])->get();

        $data = json_decode($data->toJson(),true);
       	\App\Models\Department::insert($data);
        echo "Departments have been inserted.".PHP_EOL;
    }
}
