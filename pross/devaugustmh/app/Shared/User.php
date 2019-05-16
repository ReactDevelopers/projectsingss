<?php

namespace App\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    const UPDATED_AT = 'added_date';
    public static function  all($fetch = 'array', $keys = ['*'], $where = "", $order_by = 'user_id'){
        $table_pages = DB::table('users');

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

    /**
    *   Method : save_password_resets
    *   @param $id_user
    *   @param $token
    */

    public static function save_password_resets($user_id, $email, $token)
    {
        DB::table('password_resets')->insert(['user_id'=>$user_id,'email' => $email,'token'=>$token,'created_at'=>date('Y-m-d H:i:s')]);
    }

    /**
    *   Method : CheckExpireToken
    *   @param $token
    */

    public static function checkExpireToken($token){
        return DB::table('password_resets')->where(['token'=>$token])->count();
    }

    public static function update_user($data,$id)
    {
        self::where('user_id',$id)->update($data);
    }

    /**
    *   Method : expire_reset_password
    *   @param $id_user
    */

    public static function expire_reset_password($user_id)
    {
        DB::table('password_resets')->where('user_id',$user_id)->delete();
    }

    /**
    *   Method : GetUserStatus
    *   @param $email, $usertype
    */

    public static function get_user_status($email, $user_type)
    {
        $users = DB::table('users')->where('email', $email)
                                   ->where('usertype_id',$user_type)
                                   ->first();
        return $users;
    }

    /**
    *   Method : CheckUserExists
    *   @param $email
    */

    public static function get_user($email)
    {
        $users = DB::table('users')->where('email', $email)
                                   ->first();
        return $users;
    }
}
