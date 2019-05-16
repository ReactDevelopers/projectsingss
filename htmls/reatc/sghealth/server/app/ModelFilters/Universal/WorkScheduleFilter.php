<?php

namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;

class WorkScheduleFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

        $this->join('users', 'users.id', '=', 'work_schedules.user_id')
             ->join('professions', 'professions.id', '=', 'users.profession_id');
    }

    /**
     * Filter out the list base on given profession category
     */
    public function professionCategory($category_id) {

        $this->where('professions.profession_category_id', $category_id);
    }

    /**
     * Filter out the list base on given profession
     */
    public function profession($profession_id) {

        $this->where('professions.id', $profession_id);
    }

    /**
     * Filter out the list base on given month
     */
    public function month($month) {

        $this->whereRaw("DATE_FORMAT(work_schedules.date, '%Y-%m') = '{$month}'");
    }
}
