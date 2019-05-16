<?php 
namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;

class AdvertismentFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];
    public function setup() {

       $this->select(['*'])->with('image');
    }
    public function search($val) {
         
        $this->Where('title','LIKE', "%{$val}%")
            ->orWhere('description','LiKE',"%{$val}%")
            ->orWhere('created_at','LiKE',"%{$val}%");
            
    }
   
    public function sortBy($val){
        foreach($val as $key => $value){
            $sort = $value == 'ascending' ? 'ASC' : 'DESC';
            $this->orderBy($key,$sort);   
        }
    }
}
