<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CompanyProfile extends Model
{
    protected $table = 'company_profile';
    protected $fillable = ['id', 'user_id', 'com_name','com_url', 'road_address', 'unit_address', 'postal_code', 'general_email', 'comphone_number', 'fax_number', 'com_facebook_url', 'com_twitter_url', 'com_linkedIn_url','com_headline', 'categories', 'services', 'com_testimony', 'com_write_up', 'testimonial_name', 'testimonial_designation', 'poster_pic', 'com_status'];
    public $timestamps = false;
    public static function com_Change($compid,$com_form_content)
    {
        DB::table('company_profile')->where('user_id',$compid)->update($com_form_content);
        return $com_form_content; 
    }
    
    public static function comsave($form_content)
    {
        DB::table('company_profile')->insert($form_content);
    }
}
