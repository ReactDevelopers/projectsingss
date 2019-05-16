<?php

namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;

class ConfigFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

        $this->select(['id','name','data','config_group','options']);
    }
    public function search($val) {

        $this->where('name','LIKE', "%{$val}%")->orWhere('data','LIKE', "%{$val}%");
    }

    public function sortBy($val){
        foreach($val as $key => $value){
            $sort = $value == 'ascending' ? 'ASC' : 'DESC';
            $this->orderBy($key,$sort);   
        }
    }
}
