<?php
namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;

class RoleFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

        $this->select('id','name', 'parent_role_id', 'title', 'description', 'client_ids', 'choosable', 'landing_page');
    }

    public function search($val) {

        $this->where(function($q) use ($val) {

            $q->orWhere('roles.name', 'LIKE', "%{$val}%");
            $q->orWhere('roles.title', 'LIKE', "%{$val}%");
            $q->orWhere('roles.description', 'LIKE', "%{$val}%");
        });
    }

    public function sortBy($val){
        foreach($val as $key => $value){
            $sort = $value == 'ascending' ? 'ASC' : 'DESC';
            $this->orderBy($key,$sort);   
        }
    }
}
