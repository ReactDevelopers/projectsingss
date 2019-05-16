<?php

namespace App\Lib;
use App\Models\WorkSchedule;

class SgApp {

    static function isJson($string,$return_data = false) {
        $data = json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE) ? ($return_data ? $data : TRUE) : FALSE;
    }

    /**
     * To covert the Array value in integer
     */
    static function arrayValToInt ($value) {

        $data = [];

        if(is_array($value)) {

            foreach($value as $val) {

                if($val && !in_array((int)$val, $data) ) {
                    $data[] = (int)$val;
                }
            }

            return count($data) ? $data : null;
        }

        return $value;
    }
    /**
     * Check the user WorkSchedule conflict
     */
    static function haveWorkSchedule($user_id, $date, $start_time, $end_time) {

        return WorkSchedule::where('user_id', $user_id)
            ->where('date', $date)
            ->whereRaw("(
                (work_schedules.start_time <=  '{$start_time}' AND work_schedules.end_time > '{$start_time}' )
                OR
                (  work_schedules.start_time < '{$end_time}' AND work_schedules.end_time >= '{$end_time}' )
                OR
                ( CAST('{$start_time}' AS TIME) <= work_schedules.start_time AND CAST('{$end_time}' AS TIME) > work_schedules.start_time )
                OR
                (CAST('{$start_time}' AS TIME) < work_schedules.end_time AND  CAST('{$end_time}' AS TIME) >= work_schedules.end_time )
            )")
            ->first();
    }

    /**
     * To Get the user device token Model
     */
    static function getUserDeviceToken ($user_id) {

        return \DB::table('oauth_access_tokens')
            ->join('device_user', 'device_user.device_id', '=', 'oauth_access_tokens.device_id')
            ->join('devices', 'devices.id', '=', 'device_user.device_id')
            ->whereIn('oauth_access_tokens.user_id', $user_id)
            ->where('oauth_access_tokens.revoked', '0')
            ->where('devices.device_token','<>', '')
            ->groupBy(['device_user.device_id'])
            ->select(['devices.device_token', 'device_user.settings']);
    }
}
