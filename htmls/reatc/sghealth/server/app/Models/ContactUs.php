<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;


class ContactUs extends Model
{
    use  Filterable;

    protected $table = "contact_us";
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','subject','user_id','email','phone_number','body','replied'
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'          => 'string',
        'subject'       => 'string',
        'user_id'       => 'integer',
        'email'         => 'string',
        'phone_number'  => 'string',
        'replied'       => 'json',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
