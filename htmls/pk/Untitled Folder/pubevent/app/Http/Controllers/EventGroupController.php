<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use DB;

class EventGroupController extends Controller {

    /**
     * Getting Event list from the database.
     * @param  Request $request [description]
     * @return Instance of Response
     */
    public function index(Request $request)
    {

        $groups = \App\Models\Group::select('*')->withcount('events')->with('events.eventData');

       if($request->has('searchdata') && $request->searchdata ) {

            $groups->where(function($q) use($request){
                $q->orWhere('title','LIKE',"%{$request->searchdata}%");
            });
        }

        if($request->has('filter_by_year') && $request->filter_by_year ) {

            $groups->where(function($q) use($request){
                $q->orWhere(DB::raw('YEAR(created_at)'),'=',$request->filter_by_year);
            });
        }

        switch ($request->has('sortName') && $request->sortName) {
            
            case 'title':
                $groups->orderBy('title',$request->sortOrder);
                break;     
            
            default:
                # code...
                break;
        }
        if($this->sizePerPage != "-1") {
                $groups = $groups->paginate($this->sizePerPage);
        }
        else {
         $groups = $groups->get();   
        }
        $this->data = $groups;
        return $this->response();        
    }

    /**
     * Getting the Event information by event_id 
     * @param  Request $request [description]
     * @param  [type]  $event_id [description]
     * @return Json
     */
    public function get(Request $request,$group_id)
    {
         $this->data = \App\Models\Group::select('*')->withcount('events')->with('events.eventData')->find($group_id);
         return $this->response();
    }

    /**
     * Updating the Event information.
     * @param  Request $request [description]
     * @param  [number]  $event_id 
     * @return [Json] 
     */
    public function update(Request $request, $event_id)
    {
        $validator = $this->validateRequest($request,$event_id);
        if($validator->fails()) {

            $this->status = false;
            $this->message = 'Please enter the valid details.';
            $this->errors = $validator->errors();
            $code = 403;

        }else{

            $this->message = 'Event has been Updated successfully.';
            $event_data = $request->only(['title']);
            $this->data = \App\Models\Group::find($event_id)->update($event_data);
            $code = 200;
        }

        return $this->response($code);
    }

    /**
     * handling the couse create request
     * @param  Request $request 
     * @return Json         
     */
    public function store(Request $request) {

        $validator = $this->validateRequest($request);

        if($validator->fails()) {

            $this->status = false;
            $this->message = 'Please enter the valid details.';
            $this->errors = $validator->errors();
            $code = 403;

        }else{

            $this->message = 'Event Group has been created successfully.';
            $group_data = $request->only(['title']);

            $group =\App\Models\Group::create($group_data);

            // foreach ($request->events as $event ) {
            //     $session_events[] =  [
            //         'group_id'=>$group->id,
            //         'event_id'=>$event,
            //     ];    
            // }
            // /** insert events **/
            // \App\Models\EventGroup::insert($session_events);  

            $code = 200;
        }

        return $this->response($code);
    }
    /**
     * Validate the Event create/update request
     * @param  Request $request [description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    private function validateRequest(Request $request, $id=null) {

        return  \Validator::make($request->all(),[
            'title'=>'required|max:100|min:3',
            //"events"    => "required|array",
            //"events.*"  => "required|distinct",
        ],
        [
            'title.required' =>'Please enter Event Title.', 
            //'events.*.required'=>'Please select Events.',
            //'events.required'=>'Please select Events.',
        ]
        
        );
    }

    /**
     * Getting the Event List of current_year by event_id 
     * @param  Request $request [description]
     * @return Json
     */
    public function eventlist(Request $request) {
        $list = \App\Models\Event::select('id','title')
            ->whereNOTIn('id',function($query) use($request){

            if($request->has('group_id') && $request->group_id)
                $query->select('event_id')->from('event_group')->where('group_id','!=', $request->group_id); //exclude groups whichare involved in other groups and a part of current group
            else
                $query->select('event_id')->from('event_group');

            });

        $this->data['list'] = $list->where(DB::raw('YEAR(created_at)'),"{$request->year}")
            ->get()->toArray();

        return $this->response();
    }


    /**
     * This function uses to update the event status as deleted
     * @param  Request $request [description]
     * @param  [type]  $event_id [description]
     * @return [type]           [description]
     */ 
    public function delete(Request $request,$event_id)
    {
        $this->message = 'Event Group has been deleted successfully.';
        \App\Models\Group::find($event_id)->delete();
        return $this->response();
    }


}
