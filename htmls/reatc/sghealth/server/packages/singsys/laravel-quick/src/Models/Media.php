<?php

namespace Singsys\LQ\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path', 'type', 'thumbnails', 'info'
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'thumbnails' => 'array',
        'info' => 'array',
        'path'=> 'string',
        'type'=> 'string'
    ];
}
