<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class PostType extends Model
{
    use Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'title', 'options'
    ];

      /**
	* The attributes that should be cast to native types.
	*
	* @var array
	*/
	protected $casts = [
		'name'          => 'string',
		'title'         => 'string',
		'options'       => 'json',
    ];
}
