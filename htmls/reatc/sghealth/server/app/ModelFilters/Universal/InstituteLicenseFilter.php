<?php

namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;

class InstituteLicenseFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

        // $this->select([
        //     'id',
        //     'license_id',
        //     'expiry_date',
        //     'institute_id',
        //     'branch_id',
        //     'service_id',
        // ]);
    }
    public function license($license_id) {

        $this->where('license_id', $license_id);
    }

    public function expiryDate($date){

        $this->where('expiry_date', $date);
    }

    public function institute($institute_id){

        $this->where('institute_id', $institute_id);
    }
}
