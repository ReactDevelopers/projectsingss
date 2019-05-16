<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
//use Illuminate\Support\Arr;

class EmailTemplate extends Model implements Auditable {

	use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'body', 
        'subject',
        'type',
    ];
}