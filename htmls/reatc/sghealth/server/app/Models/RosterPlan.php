<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Singsys\LQ\Lib\Media\Relations\Concerns\HasMediaRelationships;
use EloquentFilter\Filterable;

class RosterPlan extends Model
{
    use  Filterable, HasMediaRelationships;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'user_id',
        'document_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title'         => 'string',
        'document_id'   => 'int',
        'user_id'       => 'int',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];
    /**
     * Get the  documents
     */
    public function document() {

        return $this->belongsToMediaJson(config('lq.media_model_instance'), 'document_id');
    }

}
