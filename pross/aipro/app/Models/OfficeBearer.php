<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OfficeBearer extends Model
{
    protected $table = 'office_bearers';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'email', 'designation','image', 'short_desc', 'facebook', 'twitter', 'linkedin', 'content_desc','highlight1','highlight2','highlight3','description', 'bios', 'testimonial_quote', 'testimonial_name', 'testimonial_designation','created_at', 'updated_at','status'];
    // const UPDATED_AT = 'added_date';
    // public $timestamps = true;
    // public static function  all($fetch = 'array', $keys = ['*'], $where = "", $order_by = 'email_template_id'){
    //     $table_pages = DB::table('email_template');

    //     if(!empty($keys)){
    //         $table_pages->select($keys); 
    //     }

    //     if(!empty($where)){
    //         $table_pages->whereRaw($where); 
    //     }
        
    //     $table_pages->orderBy($order_by); 

    //     if($fetch === 'array'){
    //         return json_decode(
    //             json_encode(
    //                 $table_pages->get()
    //             ),
    //             true
    //         );
    //     }else{
    //         return $table_pages->get();
    //     }
    // }
}
