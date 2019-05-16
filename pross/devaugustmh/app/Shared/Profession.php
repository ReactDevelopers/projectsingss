<?php

namespace App\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profession extends Model
{
    protected $table = 'profession';
    protected $primaryKey = 'profession_id';
    const UPDATED_AT = 'created_date';
    public static function  all($fetch = 'array', $keys = ['*'], $where = "", $order_by = 'profession_id'){
        $table_pages = DB::table('profession');

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
