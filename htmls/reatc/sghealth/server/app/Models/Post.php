<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use Filterable,SoftDeletes;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'post_type_id', 'title', 'content', 'options'
    ];
     /**
	* The attributes that should be cast to native types.
	*
	* @var array
	*/
	protected $casts = [
		'name'          => 'string',
		'post_type_id'  => 'integer',
		'title'         => 'string',
		'content'       => 'string',
		'options'       => 'json',
		'created_at'    => 'datetime',
		'updated_at'    => 'datetime',
		'deleted_at'    => 'datetime'
    ];
    
    /**
    * Get the posts information
    */
    public function postType() {

		return $this->belongsTo(PostType::class, 'post_type_id', 'id');
	}
}
