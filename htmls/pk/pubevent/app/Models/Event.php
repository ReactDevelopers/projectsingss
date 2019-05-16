<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Arr;

class Event extends Model implements Auditable {

    use \Illuminate\Database\Eloquent\SoftDeletes, \OwenIt\Auditing\Auditable;

    protected $table = 'event';

    protected $fillable = [
        'title', 
        'id',
        'description',
        'start_date',
        'end_date',
        'venue',
        'security_level',
        'group_id'
    ];

    public function transformAudit(array $data): array
    {
        if (Arr::has($data, 'new_values.group_id')) {
            
            $oldGroup = Group::find($this->getOriginal('group_id'));
            $newGroup = Group::find($this->getAttribute('group_id'));
            
            if($oldGroup){

                $data['old_values']['group_name'] = $oldGroup ? $oldGroup->title: '';
            }

            $data['new_values']['group_name'] = $newGroup ? $newGroup->title : '';
        }

        return $data;
    }

}