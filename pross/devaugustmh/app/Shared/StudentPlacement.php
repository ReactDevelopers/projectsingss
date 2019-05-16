<?php

namespace App\Shared;

use Illuminate\Database\Eloquent\Model;

class StudentPlacement extends Model
{
    protected $table = 'student_placement';
    protected $primaryKey = 'student_placement_id';
    const UPDATED_AT = 'created_date';

    /**
    *   Method : update_placement
    *   @param $student_placement_id
    */
    public static function update_student_placement($data,$id)
    {
        self::where('student_placement_id',$id)->update($data);
    }
}
