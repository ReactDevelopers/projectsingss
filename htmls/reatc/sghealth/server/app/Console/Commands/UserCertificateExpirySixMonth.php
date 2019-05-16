<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserCertificate;
use App\Models\CertExpiryNotificationLog;
use App\Jobs\SendPushNotificationJob;

class UserCertificateExpirySixMonth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'certificate:six_month_expiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for send notification to the user if the certificate is expiring';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $cert_data = UserCertificate::select(['user_certificates.*','cenl.month'])->leftJoin('cert_expiry_notification_logs as cenl' ,function($join){
            $join->on(['cenl.cert_id'=>'user_certificates.id','cenl.expired_on'=>'user_certificates.expiry_date'])
            ->where('month','6');
        })
        ->where('cenl.id',null)
        ->whereRaw('12 *( YEAR(expiry_date) - YEAR(NOW())) +( MONTH(expiry_date) - MONTH(NOW()))= 6')->get();

        $logs = $cert_data->map(function($v){
            return [
                'cert_id'       => $v->id,
                'expired_on'    =>  date('Y-m-d',strtotime($v->expiry_date)),
                'month'         => '6',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),

            ];
        })->toArray();

        CertExpiryNotificationLog::insert($logs);
        
        $user_ids = $cert_data->pluck('user_id')->unique()->toArray();
        
        SendPushNotificationJob::dispatch($user_ids,[],'certificate_expire','Your certificate will expire soon','Your certificate will expires in 6 months please renew it as soon as possible.');

    }
}
