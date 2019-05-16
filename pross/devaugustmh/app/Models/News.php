<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'news';
    protected $guarded = ['id'];
    
    protected $fillable = ['id', 'title', 'description','news_url', 'updated_at', 'created_at'];
    public $timestamps = true;
    
    public static function  all($fetch = 'array', $keys = ['*'], $where = "", $order_by = 'id'){
        $table_pages = \DB::table('news');
        
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
