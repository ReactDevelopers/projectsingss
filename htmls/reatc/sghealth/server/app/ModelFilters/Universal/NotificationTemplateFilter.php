<?php

namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;

class NotificationTemplateFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {
        $this->select(['id','name','subject','body','type','options']);
            
    }
    public function search($val) {

        $this->where('name','LIKE', "%{$val}%")
        	->orWhere('subject','LIKE',"%{$val}%")
        	->orWhere('body','LIKE',"%{$val}%")
        	->orWhere('type','LIKE',"%{$val}%")
        	->orWhere('options','LIKE',"%{$val}%");
    }

    public function type($val){
        $this->where('type',$val);
    }

    public function sortBy($val){
        foreach($val as $key => $value){
            $sort = $value == 'ascending' ? 'ASC' : 'DESC';
            $this->orderBy($key,$sort);   
        }
    }
    
}
