<?php

namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;
use App\Lib\SgApp;

class BranchFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

        $this->select(['id','name','institute_id']);
    }
    public function search($val) {

        $this->where('name','LIKE', "%{$val}%");
    }

    public function institute($val){

        if( is_array($val) ) {

            $this->whereIn('institute_id',$val);

        }else{
            if(\App\Lib\SgApp::isJson($val)){

                $val = json_decode($val);
            }

            $this->where('institute_id',$val);

        }
    }

    public function sortBy($val){
        foreach($val as $key => $value){
            $sort = $value == 'ascending' ? 'ASC' : 'DESC';
            $this->orderBy($key,$sort);
        }
    }
}
