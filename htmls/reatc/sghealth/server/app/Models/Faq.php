<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class Faq extends Model
{
    use Filterable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject',
        'question',
        'answer',
        'creator_id'
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'subject'=> 'string',
        'question'=> 'string',
        'answer'=> 'string',
        'creator_id'=>'integer'
    ];
}
