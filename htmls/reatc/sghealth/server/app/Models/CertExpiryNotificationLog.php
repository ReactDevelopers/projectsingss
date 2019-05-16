<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertExpiryNotificationLog extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cert_id ',
        'expired_on'
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'cert_id'=> 'int',
        'expired_on' => 'date'
    ];
}
