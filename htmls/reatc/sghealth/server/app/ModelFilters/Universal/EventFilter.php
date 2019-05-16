<?php
namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;

class EventFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

        $this->select(['events.*'])->withCount(['members'=>function($q){
            $q->where('application_event.status','confirm');
        }])->with([
            'manager',
            'eventImages'=>function($q){$q->with(['image']);},
            'getRegisterApplication'=>function($q){
                $q->where('application_event.user_id',auth()->user()->id);
            },
        ])
        ->join('event_institutes', 'event_institutes.event_id', '=', 'events.id');
    }

    public function search($val) {
        $this->where('title','LIKE', "%{$val}%")
            ->orWhere('description','LIKE', "%{$val}%")
            ->orWhere('event_date','LIKE', "%{$val}%");
    }

    public function eventType($type) {
        if($type =='today'){
            $this->where('event_date','=', date('Y-m-d'));
        }elseif($type =='upcoming'){
            $this->where('event_date','>', date('Y-m-d'));
        }else if ($type == 'completed'){
            $this->where('event_date','<', date('Y-m-d'));
        }else if($type=='latest'){
            $this->where('event_date','>=', date('Y-m-d'))->orderBy('event_date','asc');
        }
    }

    public function sortBy($val){
        foreach($val as $key => $value){
            $sort = $value == 'ascending' ? 'ASC' : 'DESC';
            $this->orderBy($key,$sort);
        }
    }


}
