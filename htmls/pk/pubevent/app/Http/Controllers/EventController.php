<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use DB;
use App\Lib\General;

class EventController extends Controller {

    /**
     * Getting Event list from the database.
     * @param  Request $request [description]
     * @return Instance of Response
     */
    public function index(Request $request)
    {

        $events = \App\Models\Event::select('event.id','event.title','event.description','event.start_date','event.end_date','event.venue','event.security_level','group.title as group_name')
                ->leftJoin('group','group.id','=','event.group_id');

        if($request->has('searchdata') && $request->searchdata ) {

            $events->where(function($q) use($request){
                $q->orWhere('event.title','LIKE',"%{$request->searchdata}%");
                $q->orWhere('event.description','LIKE',"%{$request->searchdata}%");
            });
        }

        // if($request->has('event_type') && $request->event_type){ // for past and upcoming events
        //     $groups->where(function($q) use($request){
        //         if($request->event_type == 'past')
        //             $q->orWhere('event_date','<',"{date('Y-m-d')}");
        //         else
        //             $q->orWhere('event_date','>=',"{date('Y-m-d')}"); 
        //     });
        // }


        if($request->has('customFilters')) {
            $customFilters  = $request->customFilters;

            if(isset($customFilters['year']) && $customFilters['year'] ) {
                
                $year = $customFilters['year'];

                $events->whereRaw("DATE_FORMAT(start_date, '%Y') = {$year}");
            }          

            if(isset($customFilters['start_date']) && $customFilters['start_date'] ) {
                
                $start_date = $customFilters['start_date'];
                $events->where('start_date' ,'>=', $start_date);
            }


            if(isset($customFilters['end_date']) && $customFilters['end_date'] ) {
                
                $end_date = $customFilters['end_date'];
                $events->where('end_date' , '<=',$end_date);
            }

            if(isset($customFilters['title']) && $customFilters['title'] ) {
                
                $title = $customFilters['title'];
                $events->where('title','LIKE', '%'.$title.'%');
            }

            if(isset($customFilters['event_type']) && $customFilters['event_type'] ) {
                
                $event_type = $customFilters['event_type']; 
                
                if($event_type == 'upcoming') {

                    $events->where('start_date' , '>',date('Y-m-d'));

                }else if($event_type == 'ongoing') {

                    $events->whereRaw('start_date <= '.date("Y-m-d").' AND end_date >= '.date('Y-m-d'));
                }
                else {
                    $events->where('event_date' , '>=',date('Y-m-d'));
                }
            }
        }

        switch ($request->has('sortName') && $request->sortName) {
            
            case 'title':
                $events->orderBy('title',$request->sortOrder);
                break; 
            case 'description':
                $events->orderBy('description',$request->sortOrder);
                break; 
            case 'start_date':
                $events->orderBy('start_date',$request->sortOrder);   
            case 'end_date':
                $events->orderBy('end_date',$request->sortOrder); 
            case 'venue':
                $events->orderBy('venue',$request->sortOrder); 

            
            default:
                # code...
                break;
        }

        $events = $events->paginate($this->sizePerPage);
        $this->data = $events;
        return $this->response();        
    }

    public function getEventYear() {

        $this->data = \App\Models\Event::groupBy(\DB::raw("DATE_FORMAT( start_date,'%Y')"))
            ->select(\DB::raw("DATE_FORMAT( start_date,'%Y') as year"))->get()->pluck('year');
        return $this->response();
    }
    /**
     * Getting the Event information by event_id 
     * @param  Request $request [description]
     * @param  [type]  $event_id [description]
     * @return Json
     */
    public function get(Request $request,$event_id)
    {    
        $event = \App\Models\Event::leftjoin('group','group.id','=','event.group_id')
        ->select('event.*','group.title as group_name')->find($event_id);   
        $this->data = $event;
        return $this->response($event? 200: 404);
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
            $event_data = $request->only(['title','description','start_date','end_date','venue','security_level','group_id']);
            \App\Models\Event::find($event_id)->update($event_data);
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

            $this->message = 'Event has been created successfully.';
            $event_data = $request->all();

            \App\Models\Event::create($event_data);
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
            'description' =>'required|string',
            'start_date'=>'required|date|date_format:Y-m-d|after:yesterday',
            'end_date'=>'required|date|date_format:Y-m-d|after_or_equal:start_date',
            'venue'=>'required|string',
            'security_level'=>'required|string'
        ],
        [
            'title.required' =>'Please enter Event Title.', 
            'description.required'=>'Please enter Event Description.',
            'start_date.required'=>'Please enter Start Date.',
            'start_date.after'=>'Past dates not allowed.',
            'end_date.required'=>'Please enter End Date.',
            'end_date.after'=>'End date should be greater than Start Date.',
            'venue.required' =>'Please enter Venue.', 
            'security_level.required' =>'Please enter Security Level.', 
        ]
        
        );
    }

    /**
     * This function uses to update the event status as deleted
     * @param  Request $request [description]
     * @param  [type]  $event_id [description]
     * @return [type]           [description]
     */ 
    public function delete(Request $request,$event_id)
    {
        $this->message = 'Event has been deleted successfully.';
        \App\Models\Event::find($event_id)->delete();
        return $this->response();
    }

    /**
     * This function is used to get the template
     * @param  Request $request [description]
     * @param  [type]  individual, group [description]
     * @return [id] type=individual then event id else group id[description]
     */ 
    public function getTemplate(Request $request){

        $type = $request->type;
        $id = $request->id;

        $general = new General();
        $data = $general->getTemplate($type, $id);

        $this->data = $data;
        
        return $this->response();
    }

    /**
     * This function is used to send the notification
     * @param  Request $request [description]
     * @return Json 
     */ 
    public function sendNotification(Request $request){

        $validator =  \Validator::make($request->all(),[
                'subject'=>'required',
                'body' =>'required',
                "to"    => "required|array",
                "to.*"  => "required|distinct",
                "cc"    => "required|array",
                "cc.*"  => "required|distinct",
            ],
            [
                'subject.required' =>'Please enter Subject.', 
                'body.required'=>'Please enter Body.',
                'to.required'=>'Please select To user(s).',
                'cc.required'=>'Please select CC user(s).',
            ]
        );

        if($validator->fails()) {

            $this->status = false;
            $this->message = 'Please enter the valid details.';
            $this->errors = $validator->errors();
            $code = 403;
        } else {
                
                $general = new General();
                $general->sendEmail($request->get('subject'), $request->get('body'), $request->get('to'), $request->get('cc'));

                $this->message = 'Email has been sent successfully.';
        }
        return $this->response();
    }
}
