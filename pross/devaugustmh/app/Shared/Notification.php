<?php

namespace App\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notification extends Model
{
    protected $table = 'notification';
    protected $primaryKey = 'notification_id';
    const UPDATED_AT = 'created_date';
}
