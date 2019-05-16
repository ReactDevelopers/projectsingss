<?php

namespace App\Http\Controllers\Api\Sections\EventAction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\ApplicationEvent;
use App\Jobs\SendPushNotificationJob;
use App\Jobs\EventWinnerAnnouncement;

class EventActionController extends Controller
{
    /**
     * Store a newly applied event resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function eventRegister(Request $request ){

        $id = $request->event_id;
        $request->request->add(['user_id' =>$request->user()->id]);

        $event_data = Event::with([
                'getRegisterApplication'=>function($q){
                    $q->where('application_event.user_id',\Auth::id());
                },
            ])->where('id',$id)->first();

        $status = "confirm";

        $is_already_register = ApplicationEvent::where(['user_id'=>\Auth::id(),'event_id'=>$id])->count();

        if($is_already_register){
            $message = "You are already registered to this event";
        } else{

            $message = "You are registered successfully";
            $vacancy = $event_data->vacancy;
            $registered_user = ApplicationEvent::where('event_id',$id)->where('status','!=','reject')->count();

            if($vacancy){

                if($vacancy > $registered_user){

                    if($event_data->payment_link){
                        $status = "awaiting-payment";
                        $message = "You need to pay the fee to confirm you booking.";

                    }

                } elseif($vacancy <= $registered_user) {

                    if($request->register_as_pending) {
                        $message = "Registration has been submitted successfully in waiting list.";
                    }else{
                        return $this->setErrorCode('waiting-list')
                        ->setMessage("All vacancies are filled, please confirm to register in waiting list")
                        ->response();
                    }

                }
            }

            $appliction_data = [
                'event_id' => $id,
                'user_id' => \Auth::id(),
                'status' => $status,
                'register_as_lucky_draw' => $request->register_as_lucky_draw
            ];
            $event = ApplicationEvent::create($appliction_data);
        }

        return $this->setErrorCode($status)
            ->setData($event_data)
            ->setMessage($message)
            ->response();

    }

    /**
     * To Make the attendace over the application of event,
     */
    public function markAttendance(Request $request){

        $id = $request->event_id;
        $event_data = Event::where('id',$id)->first();

        #Check Permission
        app('permission')->throwExceptionUpdatingOtherEvent($event_data->manager_id);

        $event_lat = $event_data['place']['geometry']['location']['lat'];
        $event_long = $event_data['place']['geometry']['location']['lng'];

        /***
         * calculate distance between user's location and event venue
         */
        $distance = $this->distance($request->lat,$request->long,$event_lat,$event_long,'K');
        $distance = (int)round($distance,0);

        $user_data = ApplicationEvent::where(['user_id'=>\Auth::id(),'event_id'=>$request->event_id])->first();

        if($user_data){

            if($distance <= '3'){

                $user_data->attendance = 'present';
                $user_data->save();

                $message = "Attendance mark successfully";

            } else if(!empty($user_data['attendance'])) {

                $message = "You attendance is already submitted";

            } else {
                $message = "You are out of the range of venue";
            }
        } else {
            $message = "Invalid user";
        }

        return $this->setData($user_data)
            ->setMessage($message)
            ->response();

    }

    /**
     * To change the Event Application status
     */
    public function changeStatus(Request $request,$id){

        $user_data = ApplicationEvent::findOrFail($id);
        $event =  Event::findOrFail($user_data->event_id);

        #Check Permission
        app('permission')->throwExceptionUpdatingOtherEvent($event->manager_id);

        $user_data->status = $request->status;
        $user_data->save();

        return $this->setData($user_data)
            ->setMessage('Status change successfully')
            ->response();
    }

    /***
     * announce winner
     */
    public function createWinner(Request $request){

        $event_data = ApplicationEvent::where([
            'event_id'  => $request->event_id,
            'user_id'   => $request->user_id
        ])
        ->with(['winner','event'])
        ->first();

        $event =  Event::findOrFail($request->event_id);
        #Check Permission
        app('permission')->throwExceptionUpdatingOtherEvent($event->manager_id);

        $event_data->update(['is_winner' => 'Yes']);

        /***
         * Disptach job to send notification to the user
         */
        EventWinnerAnnouncement::dispatch( $event_data);

        return $this->setData($event_data)
            ->setMessage('Winner Announce Successfully')
            ->response();
    }

    /**
     * Calculating arround location
     */
    protected function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        }
        else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
            return ($miles * 1.609344);
            } else if ($unit == "N") {
            return ($miles * 0.8684);
            } else {
            return $miles;
            }
        }
    }
}
