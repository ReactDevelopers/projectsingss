<?php 


namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;

class AssignmentApplicationFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

       $this->select(['id','institute_id','assignment_id','user_id','status'])->with(['user']);
    }

    public function search($val) {
        $this->whereHas('user',function($q) use($val){
            $q->Where('users.email','LiKE',"%{$val}%");
        })
        ->orWhereHas('user.profession',function($q) use($val){
            $q->Where('professions.name','LiKE',"%{$val}%");
        })
        ->orWhere('status','LIKE',"%{$val}%");
    }
   
    public function sortBy($val){
        foreach($val as $key => $value){
            $sort = $value == 'ascending' ? 'ASC' : 'DESC';
            $this->orderBy($key,$sort);   
        }
    }

    public function assignment($val){
        $this->where('assignment_id',$val);
    }
}
