<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use Singsys\LQ\Lib\Media\Relations\Concerns\HasMediaRelationships;

class EventImage extends Model
{
    use HasMediaRelationships;

    protected $table = 'event_image';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'media_id',
        'is_default',
        'options',
    ];

    public function image(){
        return $this->belongsToMedia(config('lq.media_model_instance'), 'media_id');
    }
}
