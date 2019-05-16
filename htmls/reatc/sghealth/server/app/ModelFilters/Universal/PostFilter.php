<?php 
namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;

class PostFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

        $this->select(['id','name','post_type_id','title','content','options'])->with(['postType']);
    }
    public function search($val) {

        $this->where('name','LIKE', "%{$val}%");
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
