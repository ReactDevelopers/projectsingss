<?php

namespace App\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Opportunity extends Model
{
    protected $table = 'opportunity';
    protected $primaryKey = 'opportunity_id';
    const UPDATED_AT = 'created_date';
    public static function  all($fetch = 'array', $keys = ['*'], $where = "", $order_by = 'opportunity_id'){
        $table_pages = DB::table('opportunity');

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
