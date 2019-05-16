<?php

namespace App\ModelFilters\Universal;

use EloquentFilter\ModelFilter;

class UserCertificateFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function setup() {

        $this->select(['user_certificates.id',
            'user_certificates.user_id',
            'user_certificates.certificate_id',
            'user_certificates.expiry_date',
            'user_certificates.docs',
            'user_certificates.certified_on',
            'user_certificates.cert_info',
            'user_certificates.is_valid',
            'user_certificates.order'
        ])
        ->join('users', 'users.id', '=', 'user_certificates.user_id')
        ->with(['documents','certificate'])
        ->where(['user_id'=>\Auth::User()->id])
        ->orderBy('order','asc');
    }


    public function user($val){
        $this->where('user_id',$val);
    }

    public function sortBy($val){
        foreach($val as $key => $value){
            $sort = $value == 'ascending' ? 'ASC' : 'DESC';
            $this->orderBy($key,$sort);
        }
    }

    public function certificateIds($val){
        if( is_array($val) ) {

            $this->whereIn('id',$val);

        }else{
            if(\App\Lib\SgApp::isJson($val)){

                $val = json_decode($val);
            }

            $this->where('id',$val);

        }
    }
}
