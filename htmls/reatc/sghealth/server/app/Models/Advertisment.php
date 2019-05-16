<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use Singsys\LQ\Lib\Media\Relations\Concerns\HasMediaRelationships;

class Advertisment extends Model
{
	use Filterable, HasMediaRelationships;
	
	protected $fillable =[
		'title',
		'description',
		'advertisment_image_id',
		'created_at',
		'updated_at'
		
	];
	protected $appends = [
		'format_advertisement_date',
		'plain_description'
	];
	
	
	public function image() {
		
		return $this->belongsToMedia(config('lq.media_model_instance'), 'advertisment_image_id');
	} 
	
	public function getCreatedAtAttribute($val){
		return date('d-M-Y h:i A',strtotime($val));
	}

	public function getFormatAdvertisementDateAttribute(){
        return date('d M, Y',strtotime($this->created_at));
	}
	
	public function getPlainDescriptionAttribute(){
        return strip_tags($this->description);
    }
}
