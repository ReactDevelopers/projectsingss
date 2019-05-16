<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $fillable = ["name", "oganization_code"];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    public function user()
    {
        return $this->hasMany("App\User");
    }

}
