<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use EloquentFilter\Filterable;
use Singsys\LQ\Lib\Media\Relations\Concerns\HasMediaRelationships;

class InstituteCategory extends Model
{
    use SoftDeletes, Filterable, HasMediaRelationships;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'category_image_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'=> 'string',
        'category_image_id' => 'int'
    ];

    /**
     * To get the Category Icon.
     */
    public function icon() {

        return $this->belongsToMedia(config('lq.media_model_instance'), 'category_image_id');
    }
}
