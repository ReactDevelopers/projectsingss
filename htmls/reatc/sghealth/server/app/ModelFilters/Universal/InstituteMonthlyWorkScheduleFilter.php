<?php
 namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;

class InstituteMonthlyWorkScheduleFilter extends ModelFilter
{
    
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup(){
        $this->select(['*'])->with(['institute','user']);
    }

    public function search($val){
        $this->where('institute.name','LIKE',"%{$val}%");
    }

    public function institute($val){
        $this->where('institute_id',$val);
    }

    public function date($val){
        $this->whereRaw("DATE_FORMAT(date,'%m-%Y') = '".date('m-Y',strtotime($val))."'");
    }
}
