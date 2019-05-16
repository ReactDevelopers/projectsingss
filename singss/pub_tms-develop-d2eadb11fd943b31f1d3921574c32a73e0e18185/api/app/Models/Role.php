<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $fillable = ["name", "title", "description"];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    public function user()
    {
        return $this->hasMany("App\User");
    }

}
