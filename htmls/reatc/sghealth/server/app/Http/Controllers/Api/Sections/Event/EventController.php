<?php

namespace App\Http\Controllers\Api\Sections\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventImage;
use App\Models\Institute;
use App\Models\Branch;
use App\Models\ProfessionCategory;
use App\Models\EventBranch;
use App\Models\EventInstitute;
use App\Models\EventProfession;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Rules\ValidateEventForInstitute;
use App\ModelFilters\Universal\EventFilter;
use App\Models\ApplicationEvent;
use App\Notifications\InviteEventManager;
use App\Mail\InviteEventManagerMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use DB;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $event = Event::filter($request->all(), EventFilter::class);

        # Check Permission
        if(app('permission')->hasTag('my_event_as_manager')) {

            $manager_id = \Auth::id();
            $event->where('events.manager_id', $manager_id);

        } else if(app('permission')->hasTag('only_my_institute')) {

            $institute_ids =\Auth::user()->institute_ids;
            if($institute_ids) {

                $event->whereIn('event_institutes.institute_id', $institute_ids);
            }
            else {
                $event->where('events.id', -1);
            }
        }

        $event = $request->page == "-1"  ?  $event->get() : $event->paginate($request->page_size);

        $event = $event->map(function(&$v){
            if($v->vacancy){
                if($v->vacancy > $v->members_count){
                     $v->availability = $v->vacancy - $v->members_count;
                } else if($v->members_count >= $v->vacancy ){
                    $v->availability = 0;
                }
            } else {
                $v->availability = 0;
            }
            return $v;
        });
        return $this->setData(['data' =>  $event])
            ->response(); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->manager_id['new'])) {
            if(!filter_var($request->manager_id['id'], FILTER_VALIDATE_EMAIL)){
                $message = 'Please enter a valid email address';
                $this->setMessage = $message;
                throw ValidationException::withMessages(['manager_id' => $message]);
            }
        }

        $this->validation($request);

        if(filter_var($request->manager_id['id'], FILTER_VALIDATE_EMAIL)){

            $request->request->add(['manager_email' => $request->manager_id['id']]);
            $request->request->add(['manager_id' => NULL]);


        }else{
            $request->request->add(['manager_id' => $request->manager_id['id']]);
        }

        $request->request->add(['event_start_time' => $request->event_timing[0],'event_end_time' => $request->event_timing[1]]);

        $request->request->add(['created_by' =>$request->user()->id]);

        $event = Event::create($request->only(['manager_id','manager_email','title','description','options','event_date','event_start_time','event_end_time','created_by','place','payment_link','vacancy','is_lucky_draw']));

        /***
         * insert institute for branch
         */
        if(isset($request->options['all_institute'])){
            $institute_ids = Institute::get()->pluck(['id'])->toArray();
        }else{
            $institute_ids = $request->institute_ids;
        }
        $institute = array_map(function($v) use($event){
            return ['event_id' => $event->id,'institute_id' => $v, 'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')];
        },$institute_ids);

        $event->eventInstitutes()->insert($institute);

        /***
         * insert branches for event
         */
        if(isset($request->options['all_branches'])){
            $branch_ids = Branch::get()->pluck(['id'])->toArray();
        }else{
            $branch_ids = $request->branch_ids;
        }
        $branch = array_map(function($v) use($event){
            return ['event_id' => $event->id,'branch_id' => $v, 'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')];
        },$branch_ids);

        $event->eventBranches()->insert($branch);

        /***
         * insert profession for event
         */

        if(isset($request->options['all_profession'])){
            $profession_ids = ProfessionCategory::get()->pluck(['id'])->toArray();
        }else{
            $profession_ids = $request->profession_ids;
        }
        $profession = array_map(function($v) use($event){
            return ['event_id' => $event->id,'profession_cat_id' => $v, 'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')];
        },$profession_ids);

        $event->eventProfessions()->insert($profession);


        if($request->manager_email) {
            $data = [
                'link'  => env('CLIENT_BASE_URL').'register-event-manager/'.encrypt($request->manager_email)
            ];
            Mail::to($request->manager_email)
            ->send(new InviteEventManagerMail($data));
        }

        /* if($request->attendance_should_be == 'Yes'){
            QrCode::format('png')->size(1000)->generate($event->id, public_path('/storage/qrcodes/qr_code_'.$event->id.'.png'));
        } */

        if($request->event_images && is_array($request->event_images)) {

            foreach($request->event_images as $key => $value){

                $eventImages = $event->eventImages()->create(['is_default'=>$value['is_default']]);
                $eventImages->image()->addMedia($value, 'event');

            }
        }

        return $this->setData($event)
            ->setMessage('Event Added successfully')
            ->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::with([
            'eventImages'=>function($q){
                    $q->with(['image']);
                },
            'manager',
            'getRegisterApplication'=>function($q){
                $q->where('application_event.user_id',\Auth::id());
            },
            'eventBranches',
            'eventInstitutes',
            'eventProfessions',
        ])->findOrfail($id);
        #Check Permission
        app('permission')->throwExceptionUpdatingOtherEvent($event->manager_id);

        $event->total_member = ApplicationEvent::where(['status'=>'confirm','event_id'=>$id])->count();
        $event->attendees = ApplicationEvent::where(['status'=>'confirm','attendance'=>'present','event_id'=>$id])->count();
        $event->is_winner = ApplicationEvent::where(['is_winner'=>'Yes','event_id' => $event->id])->with(['winner'])->first();

        $event->availability = 0 ;

        if($event->vacancy){
            if($event->vacancy > $event->total_member){
                $event->availability = $event->vacancy - $event->total_member;
            }
        }

        $event->qr_code = base64_encode(QrCode::format('png')->size(250)->generate($event->id));

        return $this->setData(['event'=>$event])->response(200);   //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validation($request,$id);
        $event = Event::findOrFail($id);

        #Check Permission
        app('permission')->throwExceptionUpdatingOtherEvent($event->manager_id);

        $request->request->add(['updated_by' =>$request->user()->id]);

        $request->request->add(['event_start_time' => $request->event_timing[0],'event_end_time' => $request->event_timing[1]]);

        /***
         * update institute for branch
         */
        if(!isset($request->options['all_institute']) && isset($event['options']['all_institute'])){

            $event->eventInstitutes()->whereNotIn('event_institutes.institute_id', $request->institute_ids)->delete();

        }else if(isset($request->options['all_institute']) && !isset($event['options']['all_institute'])){
            $event->eventInstitutes()->delete();

            $institute_ids = Institute::get()->pluck(['id'])->toArray();

            $institute = array_map(function($v) use($event){
                return ['event_id' => $event->id,'institute_id' => $v, 'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')];
            },$institute_ids);

            $event->eventInstitutes()->insert($institute);

        }
        /***
         * update branches for event
         */
        if(!isset($request->options['all_branches']) && isset($event['options']['all_branches'])){

            $event->eventBranches()->whereNotIn('event_branches.branch_id', $request->branch_ids)->delete();

        }else if(isset($request->options['all_branches']) && !isset($event['options']['all_branches'])){

            $event->eventBranches()->delete();

            $branch_ids = Branch::get()->pluck(['id'])->toArray();

            $branch = array_map(function($v) use($event){
                return ['event_id' => $event->id,'branch_id' => $v, 'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')];
            },$branch_ids);

            $event->eventBranches()->insert($branch);
        }

        /***
         * update profession for event
         */

        if(!isset($request->options['all_profession']) && isset($event['options']['all_profession'])){

            $event->eventProfessions()->whereNotIn('event_professions.profession_cat_id', $request->profession_ids)->delete();

        }else if(isset($request->options['all_profession']) && !isset($event['options']['all_profession'])){
            $event->eventProfessions()->delete();

            $profession_ids = ProfessionCategory::get()->pluck(['id'])->toArray();

            $profession = array_map(function($v) use($event){
                return ['event_id' => $event->id,'profession_cat_id' => $v, 'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')];
            },$profession_ids);

            $event->eventProfessions()->insert($profession);

        }
        if($request->has('event_images')) {

            # Get event_image primary key those are  linked with current event
            $active_images_ids = collect($request->event_images)->pluck('id')->toArray();

            $temp_arr = [];
            foreach($active_images_ids as $key => $value){
                if($value === null){

                }else {
                    $temp_arr[] = $value;
                }
            }
            $active_images_ids = $temp_arr;

            # Delete other images which are not in this request.
            $event->eventImages()->whereNotIn('event_image.id', $active_images_ids)->delete();

            foreach($request->event_images as $key => $event_image) {

                $event_image_id = isset($event_image['id']) ? $event_image['id'] : null;
                $event_image_ins =  null;

                # If we get the event image primary key in request then fetch this image data.
                if($event_image_id) {
                    $event_image_ins =  $event->eventImages()->where('event_image.id', $event_image_id)->first();
                }

                # If image already linked with event then updating the data
                if($event_image_ins) {
                    $event_image_ins->update(['is_default'=>$event_image['is_default']]);
                }
                else {
                    $event_image_ins = $event->eventImages()->create(['is_default'=>$event_image['is_default']]);
                }

                # If user change the event image then updating it.
                if($request->has('event_images.'.$key.'.file')) {
                    $event_image_ins->image()->addMedia($event_image, 'event');
                }
            }
        }
        else {

            $event->eventImages()->delete();
        }

        $event->update($request->only(['manager_id','manager_email','title','description','options','event_date','event_start_time','event_end_time','created_by','place','payment_link','vacancy','is_lucky_draw']));

        return $this->setData($event)
            ->setMessage('Event updated successfully')
            ->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail('id',$id);
        #Check Permission
        app('permission')->throwExceptionUpdatingOtherEvent($event->manager_id);

        $event->delete();
        return $this->setMessage('Event deleted successfully.')->response(200);
    }

    protected function validation(Request $request,$id=NULL){
       /*  if(!$request->has('event_images.*.image')){
            $requiredImage = 'required';
        }else{
            $requiredImage = '';
        } */

        $isUnique = null;

        if($id == null){
            if( isset($request->manager_id['new']) ){

                $isEmailExist = User::where('email',$request->manager_id['id'])->first();
                # If email already exist
                if($isEmailExist) {
                    $isUnique = 'unique:users,email';
                }
            }

        }

        $requiredInstitute = isset($request->options['all_institute']) ? '' : 'required';
        $requiredProfession = isset($request->options['all_profession']) ? '' : 'required';
        $requiredBranches = isset($request->options['all_branches']) ? '' : 'required';

        $request->validate([
            'manager_id'                    => [$id ? '' : 'required',$isUnique],
            'place'                         => ['required'],
            'institute_ids'                 => [$requiredInstitute],
            'branch_ids'                    => [$requiredBranches],
            'profession_ids'                => [$requiredProfession],
            'vacancy'                       => ['nullable','integer'],
            'title'                         => ['required','max:255'],
            'description'                   => ['required','max:255'],
            // 'attendance_should_be'          => ['required'],
            'event_date'                    => ['required'],
            'event_timing'                  => ['required'],
            'event_images'                  => [$id? '': 'required'],
            'event_images.*.is_default'     => ['required',],
            'event_images.*.file'           => [$id ? '' : 'required'],
            ]);
        }

}
