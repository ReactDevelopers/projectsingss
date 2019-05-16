<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model  {


    protected $table = 'audits';

    function getOldValuesAttribute($data) {

        return $data ? json_decode($data) : [];
    }

    function getNewValuesAttribute($data) {

        return $data ? json_decode($data) : [];
    }

}