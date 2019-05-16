<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;




class Users extends Model
{
    
    protected $table = 'users';
    protected $fillable = ['id', 'user_type', 'name','surname', 'email', 'designation', 'userphone_number', 'profile_picture', 'bios', 'facebook_url', 'linkedIn_url', 'twitter_url', 'membership_start',
        'membership_end', 'payment_status', 'password', 'created_at', 'updated_at', 'last_login', 'status', 'remember_token'];
    public $timestamps = true;

    public static function change($userid,$form_content)
    {
        DB::table('users')->where('id',$userid)->update($form_content);
    }
    
    public static function inssave($form_content)
    {
        DB::table('users')->insert($form_content);
    }
}
