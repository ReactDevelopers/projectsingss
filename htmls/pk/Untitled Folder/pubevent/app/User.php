<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Laravel\Passport\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Arr;

class User extends Model implements AuthenticatableContract, AuthorizableContract, Auditable
{
    use Authenticatable, Authorizable, HasApiTokens, \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','role_id' ,'recipient' 
    ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    // protected $auditInclude = [
    //     'role_id',
    //     'recipient',
    // ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function transformAudit(array $data): array
    {
        if (Arr::has($data, 'new_values.role_id')) {

            $oldRole = \App\Models\Role::find($this->getOriginal('role_id'));
            $newRole = \App\Models\Role::find($this->getAttribute('role_id'));
            
            if($oldRole){
                $data['old_values']['role_name'] = $oldRole ? $oldRole->title : '';
            }
            $data['new_values']['role_name'] = $newRole ? $newRole->title: '';
        }

        if (Arr::has($data, 'new_values.recipient')) {

            $data['old_values']['recipient_as'] = $this->getRecipientAsLable($this->getOriginal('role_id'));
            $data['new_values']['recipient_as'] = $this->getRecipientAsLable($this->getAttribute('role_id'));
        }

        return $data;
    }


    public function getRecipientAsLable($val) {

        switch ($val) {
            case '1':
                return "TO";
                break;
            case '2':
                return "CC";
                break;

            default:
                return null;
                break;
        }
    }
}
