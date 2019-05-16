<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use Singsys\LQ\Lib\Media\Relations\Concerns\HasMediaRelationships;

class News extends Model
{
	use Filterable, HasMediaRelationships;

    protected $fillable =[
		'title',
		'description',
        'news_image_id',
        'created_at',
        'updated_at'

   ];

    protected $appends = [
        'format_news_date',
        'plain_description'
    ];
    public function image() {

        return $this->belongsToMedia(config('lq.media_model_instance'), 'news_image_id');
    }

    public function getCreatedAtAttribute($val){
        return date('d-M-Y h:i A',strtotime($val));
    }

    public function getFormatNewsDateAttribute(){
        return date('d M, Y',strtotime($this->created_at));
    }

    public function getPlainDescriptionAttribute(){
        return strip_tags($this->description);
    }

}

