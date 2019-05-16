<?php

namespace App\Lib;

Trait UserDataFinder 
{

	/**
     * We are using this function to get the max primary key value 
     * before the insert/update process.
     * @param NONE
     * @return INT- Max number of primary key.
     **/

    public static function getMaxId()
    {
    	$inst = new static;
        $table_name = $inst->getTable();
        $data = $inst->getConnection()->select("SHOW TABLE STATUS LIKE '{$table_name}'");
        return isset($data[0]->Auto_increment)?$data[0]->Auto_increment:1;
    }

    /**
     * When we use batch insert process then the auto_increment value increases while there is no 
     * data insert into the table. So we are using this function to handle "unnecessary  
     * increment". For the best result use this function after the "query execution".
     * @param NONE
     * @return NULL
     **/

    public static function updateAutoIncrements(){

        $inst = new static;
        $new_max_id = $inst->max($inst->getKeyName());
        $table_name = $inst->getTable();
        $max_id = ($new_max_id+1);
        $inst->getConnection()->statement('ALTER TABLE '.$table_name.' AUTO_INCREMENT='.$max_id);
    }

    /**
     * We are using this function to get the leaver list.
     * @param Array - $pubnet_ids  - All pubnet id list, which are in XML.
     * @return instance of Illuminate\Database\Eloquent\Collection
     **/

    public static function getLeavers($pubnet_ids)
    {
       return self::whereNotIn('pubnet_id',$pubnet_ids)
            ->leftJoin('departments as d','d.id','=','users.department_id')
            ->whereNull('users.deleted_at')
            ->where('pubnet_id','<>',env('TESTER_PUBNET_ID'))
            ->select(['users.pubnet_id','users.name','d.name as department'])->count();
    }

    /**
     * We are using this function to get the Mover list, who changed their department.     * 
     * @return instance of Illuminate\Database\Eloquent\Collection
     **/
    public static function getMovers()
    {
        return self::join('updated_user_during_hrdu as uudr','uudr.user_id','users.id')
            ->leftJoin('departments as d','d.id','=','users.department_id')
        ->select(['users.pubnet_id','users.name','d.name as new_department','uudr.old_department_name'])
        ->whereRaw("d.name <> uudr.old_department_name")
        ->count();
    }
    
    /**
     * We are using this function to get the Joiner list, who is newly users.
     * @param INT - $max_id  - Max primary_key value before the query execution.
     * @return instance of Illuminate\Database\Eloquent\Collection
     **/

    public static function getJoiners($max_id)
    {
        $inst = new static;
        $primary_key = $inst->getKeyName();
        $table_name = $inst->getTable();
        return self::leftjoin('updated_user_during_hrdu as uudr',function($q){
            $q->on('uudr.user_id','=','users.id')
              ->whereRaw("uudr.is_activate = 'Y'");
          })
           ->where($table_name.'.'.$primary_key,'>=',$max_id)
           ->orWhere('uudr.is_activate','=','Y')
           ->leftJoin('departments as d','d.id','=','users.department_id')
           ->select(['users.pubnet_id','users.name','d.name as department'])->count();
    }

}