<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$d1 = env('DB_DATABASE');
    	$d2 = env('DB_DATABASE_OLD');
    	$collation  = config('database.connections.mysql.collation');
		$charset  = config('database.connections.mysql.charset');

        $data = \DB::connection('mysql_old')->table('officer as f')->select([
        	'f.PersNum as pubnet_id',
        	'f.Name as name',
        	'f.Designation as designation',
        	'f.Division as division',
        	'f.Branch as branch',
        	'f.Section as section',
        	'f.Email as email',
        	\DB::raw('d.id as department_id'),
        	'f.NumLogins as num_success_login',
        	'f.LastLogin as last_success_login_attemp',
        	\DB::raw('"" as password'),    		
    		\DB::raw("IF(tbl_f.IsSuperAdmin =0,2,1) as role_id"),
    		'f.AddedDate as created_at',
    		'f.LastUpdatedDate as updated_at',
    		\DB::raw('IF(tbl_f.DeletedStatus =0,null, CURRENT_DATE() ) as deleted_at'),
    	])
    	->leftJoin(\DB::raw($d1.'.departments as d'),\DB::raw('d.name'),'=',\DB::raw("(CAST(tbl_f.Department  AS CHAR CHARACTER SET {$charset}) COLLATE {$collation})"))
    	->get();
    	$data = json_decode($data->toJson(),true);

    	\App\User::batchInsertIgnore($data);
    }
}
