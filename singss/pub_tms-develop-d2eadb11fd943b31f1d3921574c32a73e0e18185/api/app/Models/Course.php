<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $fillable = [
        'title', 
        'description',
        'target_group',
        'duration',
        'website',
        'remark',
        'special_requirement',
        'pre_requisite',

    ];

    protected $appends = ['duration_in_day','duration_in_hour'];

    /**
     * Getting the days from the duration 
     * @return [null| numeric] 
     */
    public function getDurationInDayAttribute() {

        if($this->duration){

         return floor($this->duration/24);
        }

        return null;
    }
    
    /**
     * Getting the hours from the duration 
     * @return [null| numeric] 
     */
    public function getDurationInHourAttribute() {

        if($this->duration){

         return ($this->duration%24);
        }

        return null;
    }
}