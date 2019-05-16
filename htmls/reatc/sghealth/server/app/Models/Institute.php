<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
use Singsys\LQ\Lib\Media\Relations\Concerns\HasMediaRelationships;

class Institute extends Model
{
	use SoftDeletes, Filterable, HasMediaRelationships, HasJsonRelationships;
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'name', 'registration_no','institute_category_id','logo_id','enable_roster'
	];

   /**
	* The attributes that should be cast to native types.
	*
	* @var array
	*/
	protected $casts = [
		'name'=> 'string',
		'registration_no' => 'string',
		'institute_category_id' => 'int',
		'logo_id' => 'int',
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
		'deleted_at' => 'datetime',
		'enable_roster' => 'string'
	];

	protected $dates = ['deleted_at'];

   /**
	* Get Branches of the Institute.
	*/
	public function branches() {

		return $this->hasMany(Branch::class, 'institute_id', 'id');
	}
   /**
	* Get Category Details
	*
	*/
	public function category() {

		return $this->belongsTo(InstituteCategory::class, 'institute_category_id', 'id');
	}

	/**
	 * To get the institute logo.
	 */
	public function logo() {

		return $this->belongsToMedia(config('lq.media_model_instance'), 'logo_id');
    }
    /**
     * To get the Institute Employee
     */
    public function users() {

        return $this->hasManyJson(User::class, 'institute_ids');
    }

    public function licenses()
    {
        return $this->belongsToMany(License::class, 'institute_license')
            ->withPivot([
                'is_branch_license', 'id', 'is_service_license'
            ]);
    }
}
