<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Arr;

class Group extends Model implements Auditable {

    use \Illuminate\Database\Eloquent\SoftDeletes, \OwenIt\Auditing\Auditable;

    protected $table = 'group';

    protected $fillable = [
        'id', 
        'title'
    ];

    public function events()
    { 
        return $this->hasMany(EventGroup::class,'group_id','id');
    }

}