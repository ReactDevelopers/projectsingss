<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventGroup extends Model {

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'event_group';

    protected $fillable = [
        'id', 
        'group_id',
        'event_id'
    ];

    public function eventData()
    { 
        return $this->hasOne(Event::class,'id','event_id');
    }

}