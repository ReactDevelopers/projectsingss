<?php

namespace App\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Discipline extends Model
{
    protected $table = 'discipline';
    protected $primaryKey = 'discipline_id';
    const UPDATED_AT = 'created_date';
    public static function  all($fetch = 'array', $keys = ['*'], $where = "", $order_by = 'discipline_id'){
        $table_pages = DB::table('discipline');

        if(!empty($keys)){
            $table_pages->select($keys); 
        }

        if(!empty($where)){
            $table_pages->whereRaw($where); 
        }
        
        $table_pages->orderBy($order_by); 

        if($fetch === 'array'){
            return json_decode(
                json_encode(
                    $table_pages->get()
                ),
                true
            );
        }else{
            return $table_pages->get();
        }
    }
}
