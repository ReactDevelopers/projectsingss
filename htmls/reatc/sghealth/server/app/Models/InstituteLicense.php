<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class InstituteLicense extends Model
{
    //
    use  Filterable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'license_id',
        'expiry_date',
        'institute_id',
        'branch_id',
        'service_id',
        'created_by',
        'updated_by',
        'institute_license_id'
    ];

    protected $casts = [
        'license_id' => 'int',
        'institute_license_id' => 'int',
        'expiry_date' => 'string',
        'institute_id' => 'int',
        'branch_id' => 'int',
        'service_id' => 'int',
        'created_by' => 'inst',
        'updated_by' => 'inst',
    ];

    public function institute () {

        return $this->belongsTo(Institute::class);
    }

    public function branch() {

        return $this->belongsTo(Branch::class);
    }

    public function service () {

        return $this->belongsTo(Service::class);
    }
    public function license () {

        return $this->belongsTo(License::class);
    }
}
