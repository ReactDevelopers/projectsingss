<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use Singsys\LQ\Lib\Media\Relations\Concerns\HasMediaRelationships;

class Banner extends Model
{
    //
    use Filterable, HasMediaRelationships;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'banner_category_id','banner_image_id','options'
    ];
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'banner_category_id' => 'int',
        'banner_image_id' => 'int',
        'options' => 'json',
    ];
    /**
     *
     */
    public function image() {

        return $this->belongsToMedia(config('lq.media_model_instance'), 'banner_image_id');
    }
}
