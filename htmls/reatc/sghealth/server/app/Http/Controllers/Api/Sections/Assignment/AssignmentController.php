<?php

namespace App\Http\Controllers\Api\Sections\Assignment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\UserCertificate;
use App\ModelFilters\Universal\AssignmentFilter;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $assignment = Assignment::with(['institute','branch','assignmentTimings'=>function($q){
                $q->with(['assignment']);
            },
            'assignmentApplication'=>function($q){
                $q->where('assignment_application.user_id',\Auth::id());
            }])->filter($request->all(), AssignmentFilter::class);

        # Check permission & Apply Filter
        if(app('permission')->hasTag('only_my_institute')) {

            $institute_ids = Auth::user()->institute_ids;
            if($institute_ids) {

                $assignment->whereIn('assignments.institute_id', $institute_ids);
            }
            else {
                $assignment->where('assignments.id', -1);
            }
        }
        $assignment = $request->page == "-1"  ? ['data' => $assignment->get()] : $assignment->paginate($request->page_size);

        return $this->setData($assignment)->response();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);
        $data = [
            'institute_id'          => $request->institute_id,
            'branch_id'             => $request->branch_id,
            'title'                 => $request->title,
            'description'           => $request->description,
            'cost'                  => $request->cost,
            'created_by'            => \Auth::id()
        ];
        # Check Permission
        app('permission')->throwExceptionUpdatingOtherInstitue($request->institute_id);

        $assignment   = Assignment::create($data);

        $assignment_timings = $request->assignment_timings ? $request->assignment_timings : [];

        if(!empty($assignment_timings)){
            $assignmentData = [];

            foreach ($assignment_timings as $key => $assignment_timing) {
                $assignmentData[] = [
                    'date'              => $assignment_timing['date'],
                    'start_time'        => $assignment_timing['times'][0],
                    'end_time'          => $assignment_timing['times'][1]
                ];
            }
            $assignment->assignmentTimings()->createMany($assignmentData);
        }

        return $this->setData($assignment)->response(200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
       $assignment = Assignment::with(['institute' => function($q) {
           $q->with(['branches' => function ($q){
                $q->select('id', 'name', 'institute_id');
           }]);
       },'branch','assignmentTimings'=>function($q){
            $q->with(['assignment']);
        },
        'assignmentApplication'=>function($q){
            $q->where('assignment_application.user_id',\Auth::id());
        }])->where('id',$id)->first();

        # Check Permission
        app('permission')->throwExceptionUpdatingOtherInstitue($assignment->institute_id);

        return $this->setData(['assignment'=>$assignment])->response();
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

        $assignment                      = Assignment::find($id);
        # Check Permission
        app('permission')->throwExceptionUpdatingOtherInstitue($assignment->institute_id);

        $assignment->institute_id        = $request->institute_id;
        $assignment->branch_id           = $request->branch_id;
        $assignment->title               = $request->title;
        $assignment->description         = $request->description;
        $assignment->cost                = $request->cost;
        $assignment->updated_by          = \Auth::id();

        $assignment->save();


        if($request->has('assignment_timings')) {

            $assignment_timing_ids = collect($request->assignment_timings)->pluck('id')->toArray();

            $assignment->assignmentTimings()
            ->where('assignment_timings.assignment_id', $assignment->id)
            ->whereNotIn('assignment_timings.id', $assignment_timing_ids)
            ->delete();

            foreach($request->assignment_timings as $key => $assignment_timing) {

                $assignment_timing_inst =  isset($assignment_timing['id']) ? $assignment->assignmentTimings()->where('id', $assignment_timing['id'])->first(): null;
                // dd($assignment_timing_inst);

                $data = [
                    'date'              => $assignment_timing['date'],
                    'start_time'        => $assignment_timing['times'][0],
                    'end_time'          => $assignment_timing['times'][1]
                ];

                if($assignment_timing_inst) {

                    $assignment_timing_inst->update($data);
                }
                else {
                    $assignment->assignmentTimings()->create($data);
                }

            }
        }

        return $this->setData($assignment)->response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request,$id)
    {
        $assignment = Assignment::findOrFail($id);
        # Check Permission
        app('permission')->throwExceptionUpdatingOtherInstitue($assignment->institute_id);

        $assignment->delete();
        $message = "your job has been deleted successfully";
        return $this->setMessage($message)->response(200);
    }

    protected function validation(Request $request,$id=NULL)
    {
        $request->validate([
            'institute_id'           => ['required','integer'],
            'branch_id'              => ['required'],
            'title'                  => ['required','max:255'],
            'description'            => ['required','max:255'],
            'cost'                   => ['required','integer'],
            'assignment_timings.*.date' => ['required','date','date_format:Y-m-d'],
            'assignment_timings.*.times' => ['required','array'],
        ]);
    }

    // public function checkQuery(Request $request)
    // {
    //     $date = \Carbon\Carbon::today()->subDays(2);
    //     dd($date);
    //     $users = UserCertificate::where('expiry_date', '<=', $date)->get();
    //     dd($users->toArray());
    // }
}
