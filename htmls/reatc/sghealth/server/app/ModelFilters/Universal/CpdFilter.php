<?php

namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;

class CpdFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

        $this->select(['*'])->with(['document']);
    }

    public function search($search) {

        $this->where(function ($q) use($search) {
            $q->orWhere('code', 'LIKE', "%{$search}%");
            $q->orWhere('title', 'LIKE', "%{$search}%");
            $q->orWhere('description', 'LIKE', "%{$search}%");
        });
    }
    public function sortBy($val){
        foreach($val as $key => $value){
            $sort = $value == 'ascending' ? 'ASC' : 'DESC';
            $this->orderBy($key,$sort);
        }
    }
}
