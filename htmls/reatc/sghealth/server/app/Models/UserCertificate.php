<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Singsys\LQ\Lib\Media\Relations\Concerns\HasMediaRelationships;
use EloquentFilter\Filterable;


class UserCertificate extends Model
{
    use HasMediaRelationships,Filterable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'certificate_id', 'expiry_date', 'docs','certified_on','cert_info','is_valid','order'
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'docs'              => 'array',
        'user_id'           => 'int',
        'certificate_id'    => 'int',
        'expiry_date'       => 'date',
        'cert_info'         => 'string',
        'certified_on'      => 'date',
        'is_valid'          => 'string',
        'order'             => 'int'
    ];

    /**
     * Get the Cerficate documents
     */
    public function documents() {

        return $this->belongsToMediaJson(config('lq.media_model_instance'), 'docs');
    }


    /**
     * Get certificate category list
     */
    public function certificate(){
        return $this->belongsTo(Certificate::class,'certificate_id','id');
    }

    /**
     * Function for change the expiry date format
     */
    protected function getExpiryDateAttribute($value){
        return date('Y-m',strtotime($value));
    }

    /***
     * Function for changing  the format of expiry date
     */
    protected function setExpiryDateAttribute($value){
        $this->attributes['expiry_date'] =  date('Y-m-d', strtotime($value));
    }

    protected function getCertifiedOnAttribute($value){
        return date('Y-m-d',strtotime($value));
    }
}
