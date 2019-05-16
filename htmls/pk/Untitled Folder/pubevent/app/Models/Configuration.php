<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model {

    protected $table = 'configuration';

    protected $fillable = ["id", "key", "value"];

    protected $dates = [];
}
