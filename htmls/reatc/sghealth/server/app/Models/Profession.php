<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use EloquentFilter\Filterable;

class Profession extends Model
{
    //
    use SoftDeletes, Filterable;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
        'profession_category_id',
        'description',
        'options'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'=> 'string',
        'description'=> 'string',
        'profession_category_id' => 'int',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'options' => 'json'
    ];

    /**
	* Get Category Details
	*
	*/
	public function category() {

		return $this->belongsTo(ProfessionCategory::class, 'profession_category_id', 'id');
	}

    
}
