<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;


class ApplicationEvent extends Model
{

    use  Filterable;

    protected $table = 'application_event';
    protected $fillable = [
        
      'event_id',
      'user_id',
      'institute_id',
      'status',
      'is_winner',
      'register_as_lucky_draw'
    ]; 

    public function winner(){
      return $this->hasOne(User::class,'id','user_id');
    }

    public function event(){
      return $this->belongsTo(Event::class,'event_id','id');
    }
}
