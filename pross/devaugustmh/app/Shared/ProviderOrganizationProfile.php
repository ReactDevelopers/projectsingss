<?php

namespace App\Shared;

use Illuminate\Database\Eloquent\Model;

class ProviderOrganizationProfile extends Model
{
    protected $table = 'provider_organisation_profile';
    protected $primaryKey = 'provider_organisation_profile_id';
    const UPDATED_AT = 'created_date';
    public static function  all($fetch = 'array', $keys = ['*'], $where = "", $order_by = 'provider_organisation_profile_id'){
        $table_pages = DB::table('provider_organisation_profile');

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
