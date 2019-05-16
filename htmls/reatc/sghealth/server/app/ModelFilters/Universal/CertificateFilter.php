<?php

namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;

class CertificateFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

        $this->select(['*']);
    }
    public function search($val) {

        $this->where('title','LIKE', "%{$val}%");
    }

    public function notIds($val) {

        if(is_array($val) && count($val))
            $this->whereNotIn('certificates.id', $val);
    }

    public function deletedAt(){
        $this->where('deleted_at','!=',NULL)->withTrashed();
    }

    public function sortBy($val){
        foreach($val as $key => $value){
            $sort = $value == 'ascending' ? 'ASC' : 'DESC';
            $this->orderBy($key,$sort);   
        }
    }
}
