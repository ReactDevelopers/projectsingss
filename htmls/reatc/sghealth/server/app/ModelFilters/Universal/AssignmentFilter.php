<?php 

namespace App\ModelFilters\Universal;


use EloquentFilter\ModelFilter;

class AssignmentFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

       $this->select(['id','institute_id','branch_id','title','description','cost']);
    }
    public function search($val) {
         
        $this->Where('title','LIKE', "%{$val}%")
            ->orWhere('description','LiKE',"%{$val}%");
            
    }
    

    public function sortBy($val){
        foreach($val as $key => $value){
            $sort = $value == 'ascending' ? 'ASC' : 'DESC';
            $this->orderBy($key,$sort);   
        }
    }
}
