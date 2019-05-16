<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Singsys\LQ\Lib\Media\Relations\Concerns\HasMediaRelationships;
use EloquentFilter\Filterable;

class Cpd extends Model
{
	use HasMediaRelationships,Filterable;
	public $timestamps = false;
	
    protected $table='cpd';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','code','cpd_credit','title','description','role','date','document_id'
    ];

    /**
	* The attributes that should be cast to native types.
	*
	* @var array
	*/
	protected $casts = [
		'user_id'=> 'int',
		'code'=> 'string',
		'cpd_credit' => 'int',
		'title' => 'string',
		'description' => 'string',
		'role' => 'string',
		'date' => 'date',
		'cpd_credit' => 'string',
		'document_id' => 'int',
	];

    /**
	 * To get the institute logo.
	 */
	public function document() {

		return $this->belongsToMedia(config('lq.media_model_instance'), 'document_id');
	}
}
