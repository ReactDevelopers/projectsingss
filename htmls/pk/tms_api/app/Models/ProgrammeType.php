<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgrammeType extends Model {

    protected $fillable = ["prog_type_code","prog_type_name"];

    public static function getCached()
    {
        $self = new static;

        return \Cache::rememberForever('ProgrammeType:all', function () use($self) {
            return $self->select('id','prog_type_code','prog_type_name')->get()->toArray();
        });
    }
}