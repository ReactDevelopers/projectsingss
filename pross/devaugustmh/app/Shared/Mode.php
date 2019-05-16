<?php

namespace App\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mode extends Model
{
    protected $table = 'mode';
    protected $primaryKey = 'mode_id';
    const UPDATED_AT = 'added_date';
    public static function  all($fetch = 'array', $keys = ['*'], $where = "", $order_by = 'mode_id'){
        $table_pages = DB::table('mode');

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
