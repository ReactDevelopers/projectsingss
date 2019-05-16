<?php

namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;


class ProfessionCategoryFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

        $this->select(['id','name','category_image_id'])
            ->with(['icon'=> function($q) {
                $q->select('id','path','info');
            }]);
    }
    public function search($val) {

        $this->where('name','LIKE', "%{$val}%");
    }

    public function sortBy($val){
        foreach($val as $key => $value){
            $sort = $value == 'ascending' ? 'ASC' : 'DESC';
            $this->orderBy($key,$sort);
        }
    }

    public function deletedAt(){
        $this->where('deleted_at','!=',NULL)->withTrashed();
    }

    public function notInIds($ids) {

        $ids = is_array($ids) ?  array_map('intval', $ids) : [(int) $ids];
        $this->whereNotIn('profession_categories.id', $ids);
    }

}
