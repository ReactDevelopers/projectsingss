<?php

namespace App\Http\Controllers\Api\Sections\Assignment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AssignmentApplication;
use App\Models\Assignment;
use App\Models\User;
use App\ModelFilters\Universal\AssignmentApplicationFilter;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use App\Notifications\JobApplyNotification;


class AssignmentApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $application = AssignmentApplication::filter($request->all(), AssignmentApplicationFilter::class);
        # Check permission & Apply Filter
        if(app('permission')->hasTag('only_my_institute')) {

            $institute_ids = Auth::user()->institute_ids;
            if($institute_ids) {

                $application->whereIn('assignment_application.institute_id', $institute_ids);
            }
            else {
                $application->where('assignment_application.id', -1);
            }
        }
        $application = $request->page == "-1"  ? ['data' => $application->get()] : $application->paginate($request->page_size);

        return $this->setData($application)->response();

    }

    /**
     * To Store the Job and user relation into database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'assignment_id'          => ['required'],
        ]);

        $assignment = Assignment::findOrFail($request->assignment_id);

        $assignment_application =  AssignmentApplication::where([
            'user_id' => \Auth::id(),
            'assignment_id' => $assignment->id,
        ])->first();

        # If user already applied for the Assi
        if($assignment_application) {

            $message = 'You have already applied for this job.';
            $this->setMessage = $message;
            throw ValidationException::withMessages(['assignment_id' => $message]);
        }

        # Store User and Job relation into database.
        $application   = AssignmentApplication::create([
            'user_id' => \Auth::id(),
            'assignment_id' => $assignment->id,
            'institute_id'  => $assignment->institute_id
        ]);

        if($assignment->created_by){

            $user = User::with([
                'certificates' => function($q){
                    $q->with(['documents','certificate']);
                },
                'profession'
            ])->where('id',$assignment->created_by)->first();

            $user->notify(new JobApplyNotification($assignment));
        }

        return $this->setData($application)->setMessage('You have successfully applied to the job')->response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignment = Assignment::findOrFail($id);
        # Check Permission
        app('permission')->throwExceptionUpdatingOtherInstitue($assignment->institute_id);

        $application = AssignmentApplication::where('assignment_id',$id)->with(['user'])->get();
        return $this->setData($application)->response(200);
    }

    /**
     * Just only update the status
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status'=> [Rule::in(['Approved', 'Rejected'])]
        ]);

        $assignment_application = AssignmentApplication::findOrFail($id);
        # Check Permission
        app('permission')->throwExceptionUpdatingOtherInstitue($assignment_application->institute_id);

        $assignment_application->update(['status' => $request->status]);

        return $this->setData([
            'assignment_application' => $assignment_application,
        ])
        ->setMessage('Job status change  successfull')
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
        //
        $assignment_application = AssignmentApplication::findOrFail($id);
        # Check Permission
        app('permission')->throwExceptionUpdatingOtherInstitue($assignment_application->institute_id);

        $assignment_application->delete();

        return $this->setData([
            'assignment_application' => $assignment_application,
        ])->response();
    }
}
