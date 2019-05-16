<?php

namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;

class UserFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

        $this->select(['id','name','email','mobile_no','institute_ids','branch_ids','branch_id','profession_id','profile_pic_id','service_ids'
        ])->with([
			'institute',
			'branch',
			'profession',
			'profileImage',
            'services',
            'canWorkAt',
		])->where('id','<>',auth()->user()->id);
    }

    public function role($val){
        if(is_array($val)){
            $this->whereIn('role_id',$val);

        }else{
            $this->where('role_id',$val);
        }

    }

    public function search($val) {
        $this->whereRaw(' ( name LIKE "'."%{$val}%".'" OR email LIKE "'."%{$val}%".'" OR mobile_no LIKE "'."%{$val}%".'" )');
    }

    public function deletedAt(){
        $this->where('deleted_at','!=',NULL)->withTrashed();
    }

    public function institute($institute_ids) {

        $institute_ids = is_array($institute_ids) ?  array_map('intval',$institute_ids) : [(int) $institute_ids];

        foreach($institute_ids as $institute_id) {

            $this->orwhereJsonContains('institute_ids', $institute_id);
        }

        // $this->whereJsonContains('institute_ids', $institute_ids);
    }

    /**
     * Filter the user by branch id and the given branch id dataType can be Array or String
     */
    public function branch($branch_id) {

        $branch_id = is_array($branch_id) ?  array_map('intval',$branch_id) : [(int) $branch_id];
        $this->whereJsonContains('branch_id', $branch_id);
    }

    public function profession($val) {

        $this->whereIn('profession_id',$val);
    }

    /**
     * Filter the user by service Id and the given service id dataType can be Array or String
     */
    public function service($val) {

        $val = is_array($val) ?  array_map('intval',$val) : [(int) $val];
        $this->whereJsonContains('service_ids',$val);
    }

    public function ahpc($val){
        $this->whereIn('ahpc',$val);
    }

    public function sortBy($val){
        $columns = [
            'institute_name' => 'institutes.name',
            'name'           => 'name',
            'email'          => 'email',
            'branch_name'    => 'branches.name',
            'profession_name'=> 'professions.name'
        ];

        foreach($val as $key => $value){

            $col = isset($columns[$key]) ? $columns[$key] : null;
            if($col) {
                $sort = $value == 'ascending' ? 'ASC' : 'DESC';
                $this->orderBy($col,$sort);
            }
        }
    }
}
