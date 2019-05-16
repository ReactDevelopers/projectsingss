<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
use Singsys\LQ\Lib\Media\Relations\Concerns\HasMediaRelationships;
use Singsys\LQ\Lib\Token\AuthToken;
use Laravel\Passport\HasApiTokens;
use EloquentFilter\Filterable;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes, HasJsonRelationships, HasMediaRelationships,Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'name_at_work',
        'email',
        'password',
        'email_verified_at',
        'remember_token',
        'mobile_no',
        'role_id',
        'institute_ids',
        'ahpc_expiry_date',
        'branch_ids',
        'branch_id',
        'profession_id',
        'service_ids',
        'mobile_verified_at',
        'status',
        'profile_pic_id',
        'employee_id',
        'ahpc',
        'options',
        'additional_informations'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'service_ids','branch_ids'
    ];

    protected $casts = [
        'name'=> 'string',
        'name_at_work'=> 'string',
        'email'=> 'string',
        'password'=> 'string',
        'email_verified_at'=> 'datetime',
        'remember_token'=> 'string',
        'mobile_no'=> 'string',
        'role_id'=> 'int',
        'institute_ids'=> 'json',
        'branch_id'=> 'int',
        'branch_ids'=> 'json',
        'profession_id'=> 'int',
        'service_ids'=> 'json',
        'mobile_verified_at'=> 'datetime',
        'status'=> 'string',
        'profile_pic_id' => 'int',
        'employee_id' => 'string',
        'ahpc'  => 'string',
        'ahpc_expiry_date'  => 'string',
        'options'=>'json',
        'additional_informations'=>'json',
    ];

    protected $appends = [
        "mobile_code",
        "mobile_number"

    ];

    /**
     * Get user certificates.
     */
    public function certificates() {

        return $this->hasMany(UserCertificate::class, 'user_id', 'id');
    }
    /**
     * Get user Institute.
     */
    public function institute() {

        return $this->belongsToJson(Institute::class, 'institute_ids', 'id');
    }

    /**
     * Get user Branch.
     */
    public function branch() {

        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    /**
     * Get user works list.
     */
    public function canWorkAt() {

        return $this->belongsToJson(Branch::class, 'branch_ids')->select('id','name');
    }

    /**
     * Get user profession.
     */
    public function profession() {

        return $this->belongsTo(Profession::class, 'profession_id', 'id')->select('id', 'name', 'description', 'profession_category_id','options');
    }

    /**
    * Get the services information
    */
   public function services() {

        return $this->belongsToJson(Service::class,  'service_ids')->select('id','name', 'short_name');
   }
   /**
    * To get or Update the profile Image
    */
    public function profileImage() {

        return $this->belongsToMedia(config('lq.media_model_instance'), 'profile_pic_id');
    }
    /**
     * To get the user role information
     */
    public function role() {

        return $this->belongsTo(Role::class);
    }

    public function createUserToken() {

        $client_id = request()->client()->id;
        $device_id = request()->device()->id;
        $token = new AuthToken($client_id, $this->id );
        return $token->generateToken();
    }

    /***
     * return only country code of mobile_no
     */
    protected function getMobileCodeAttribute(){
        return $this->mobile_no ? explode('-',$this->mobile_no)[0]: null;
    }

    /***
     * return only mobile number
     */
    protected function getMobileNumberAttribute(){
        return $this->mobile_no ? explode('-',$this->mobile_no)[1] : null;
    }

    /**
     * update only int values
     */
    protected function getBranchIdsAttribute($val){
        $val = $val ? json_decode($val) : $val;
        return $val  && is_array($val) ? array_map('intval', $val) : null;
    }

    public  function devices() {

        return $this->belongsToMany(Device::class)->withPivot([
            'settings', 'login_index', 'active'
        ])->using(Relations\DevicePivot::class);
    }
}
