<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{
    use  Filterable,SoftDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'upload_document'
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title'=> 'string',
        'upload_document' => 'string'
    ];

    protected $appends = ['name'];


    protected function getNameAttribute(){
        return $this->title;
    }
    protected function getIdAttribute($val){
        if(strtolower($this->title) == 'others'){
            return null;
        }else{
            return $val;
        }
    }

}
