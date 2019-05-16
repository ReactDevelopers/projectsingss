<?php

namespace App\Http\Controllers\Api\Sections;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Crypt;
use App\ModelFilters\Universal\DeviceFilter;
use App\Models\Device;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $devices = Device::filter($request->all(), DeviceFilter::class)->paginate($request->page_size);
        return $this->setData($devices)
        ->response();
    }


    public function revokedDeviceUser(Request $request, $user_id) {

        $user_device  = $request->device()->users()->where('users.id', $user_id)->first();
        if($user_device) {
            $request->device()->users()->syncWithoutDetaching([$user_id => ['active' => 'No', 'revoked' => '1']]);
        }
        return $this->setMessage('User Has been revoked.')->response();
    }
    /**
     * To get login user of the given device.
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function deviceLoginUser(Request $request) {

        $users = $request->device()->users()
            ->where('device_user.revoked', '0')
            ->with(['profileImage'=> function($q){
                $q->select('id','path');
            },'role'=>function($q){
                $q->select('id','landing_page', 'settings');
            }])
        ->get();

        return $this->setData([
            'device_users' => $users
        ])->response();

    }
}
