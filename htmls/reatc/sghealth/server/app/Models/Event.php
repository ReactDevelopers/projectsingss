<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;


class Event extends Model
{
    use Filterable,HasJsonRelationships;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'manager_id',
        'manager_email',
        'title',
        'description',
        'place',
        'is_lucky_draw',
        'options',
        'event_date',
        'event_start_time',
        'event_end_time',
        'created_by',
        'updated_by',
        'vacancy',
        'payment_link',
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'manager_id' => 'int',
        'manager_email' => 'string',
        'title' => 'string',
        'description' => 'string',
        'options' => 'json',
        'event_date' => 'date',
        'event_start_time' => 'time',
        'event_end_time' => 'time',
        'place' => 'json',
        'created_by'=>'int',
        'updated_by' => 'int',
        'payment_link' => 'string',
        'vacancy' => 'string'
    ];

    protected $appends = [
        'event_timing' ,
        'format_event_date',
        'plain_description'
    ];

    public function getFormatEventDateAttribute(){
        return date('d-M-Y',strtotime($this->event_date));
    }

    public function getEventStartTimeAttribute($val){
        return date('h:i A',strtotime($val));
    }

    public function getEventEndTimeAttribute($val){
        return date('h:i A',strtotime($val));
    }

    

    /**
	* Get event images
	*
	*/
	public function eventImages() {

		return $this->hasMany(EventImage::class, 'event_id', 'id');
    }
    
    /*get formatted monday to friday start-end time*/
    public function getEventTimingAttribute(){
        return [date('H:i:s',strtotime($this->event_start_time)) ,date('H:i:s',strtotime($this->event_end_time))] ;
    }
    /**
	* Get event manager
	*/
	public function manager() {

		return $this->belongsTo(User::class, 'manager_id', 'id')->with(['profileImage']);
    }


    /**
	* Get event institutes
	*/
	public function eventInstitutes() {

		return $this->hasMany(EventInstitute::class, 'event_id', 'id');
    }


    /**
	* Get event branches
	*/
	public function eventBranches() {

		return $this->hasMany(EventBranch::class, 'event_id', 'id');
    }

    /**
	* Get event professions
	*/
	public function eventProfessions() {

		return $this->hasMany(EventProfession::class, 'event_id', 'id');
    }

    /**
     * Get Registered Memebers
     *
     */
    public function members() {

        return $this->hasManyThrough(User::class, ApplicationEvent::class, 'event_id', 'id','id','user_id')->with(['profileImage']);
    }

    /**
     * Get Registered Memebers
     *
     */
    public function getRegisterApplication() {

        return $this->hasMany(ApplicationEvent::class, 'event_id', 'id');
    }

    public function getPlainDescriptionAttribute(){
        return strip_tags($this->description);
    }

}
