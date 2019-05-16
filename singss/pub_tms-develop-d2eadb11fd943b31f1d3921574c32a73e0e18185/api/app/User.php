<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Laravel\Passport\HasApiTokens;
use App\Lib\UserDataFinder;
use \Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use HasApiTokens, Authenticatable, Authorizable,Lib\BulkDataQuery, UserDataFinder,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','pubnet_id','role_id','department_id','designation','division','section','branch'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public static function insertUpdateBulk($attributes){
          
        $model = new static();
        $sql = $model->batchInsertUpdate($attributes,['email','name','pubnet_id','department_id','deleted_at','updated_at']);
    }
}
