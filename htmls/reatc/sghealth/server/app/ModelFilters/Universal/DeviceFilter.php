<?php

namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;


class DeviceFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

        $this->select(['name', 'device_id', 'device_token', 'info', 'client_id','id'])->with('client');
    }
    public function search($val) {

        $this->where('name','LIKE', "%{$val}%")->orWhere('device_id','LIKE',"%{$val}%");
    }
    /**
     * Filter the device base on given client id.
     */
    public function client($client_id) {

        $this->where('client_id', $client_id);
    }

    public function sortBy($val){
        foreach($val as $key => $value){
            $sort = $value == 'ascending' ? 'ASC' : 'DESC';
            $this->orderBy($key,$sort);
        }
    }
}
