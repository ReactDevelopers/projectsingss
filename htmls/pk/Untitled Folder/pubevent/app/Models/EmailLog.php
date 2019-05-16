<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model {

    protected $table = 'email_log';

    protected $fillable = [
        'id', 
        'subject',
        'recipient_to',
        'recipient_cc',
        'status'
    ];
}