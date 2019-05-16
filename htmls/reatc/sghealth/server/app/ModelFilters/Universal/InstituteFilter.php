<?php

namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;

class InstituteFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

        $this->select(['institutes.id','institutes.name','institute_category_id','registration_no','logo_id'])
            ->join('institute_categories','institute_categories.id','=','institutes.institute_category_id')
            ->with(['category','logo','branches']);
    }
    public function search($val) {

        $this->where('institutes.name','LIKE', "%{$val}%")
            ->orWhere('institutes.registration_no','LIKE', "%{$val}%");
    }

    public function instituteCategory($val){

        $this->where('institute_category_id',$val);
    }

    public function deletedAt(){
        $this->where('institutes.deleted_at','!=',NULL)->withTrashed();
    }

    public function sortBy($val){

        $columns = [
            'category_name' => 'institute_categories.name',
            'name'          => 'institutes.name'
        ];

        foreach($val as $key => $value){
            $col = isset($columns[$key]) ? $columns[$key] : $key;
            if($col) {
                $sort = $value == 'ascending' ? 'ASC' : 'DESC';
                $this->orderBy($col,$sort);
            }
        }
    }
}
