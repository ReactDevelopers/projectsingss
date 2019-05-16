<?php

namespace App\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Research extends Model
{
    protected $table = 'research_type';
    protected $primaryKey = 'research_type_id';
    const UPDATED_AT = 'updated_at';
    public static function  all($fetch = 'array', $keys = ['*'], $where = "", $order_by = 'research_type_id'){
        $table_pages = DB::table('research_type');

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
