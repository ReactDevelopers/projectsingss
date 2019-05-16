<?php

namespace App\Http\Controllers\Api\Sections\Institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Institute;
use App\Models\InstituteCategory;
use App\Models\User;
use App\Models\Branch;
use App\Rules\UniqueArrayValue;

use App\ModelFilters\Universal\InstituteFilter;
use Illuminate\Validation\Rule;


class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $institutes = Institute::filter($request->all(), InstituteFilter::class);

        # When login user can access their institue
        if(app('permission')->hasTag('only_my_institute')) {
            $institute_ids = \Auth::user()->institute_ids;
            if($institute_ids) {

                $institutes->whereIn('institutes.id', $institute_ids);
            }
            else {
                $institutes->where('institutes.id', -1);
            }
        }

        $institutes = $request->page == "-1"  ? ['data' => $institutes->get()] : $institutes->paginate($request->page_size);

        return $this->setData($institutes)
            ->response();
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

        $institute = Institute::create([
            'name'                  => $request->name,
            'registration_no'       => $request->registration_no,
            'institute_category_id' => $request->institute_category_id,
            'enable_roster'         => $request->enable_roster
        ]);

        if($request->hasFile('logo.file')) {
            $institute->logo()->addMedia($request->logo, 'institute');
        }

        foreach ($request->branches as $key => $branch) {

            $branch['mon_fri_start_time'] = $branch['mon_fri_timing'][0];
            $branch['mon_fri_end_time'] = $branch['mon_fri_timing'][1];

            $branch['sun_start_time'] = $branch['sunday_timing'][0];
            $branch['sun_end_time'] = $branch['sunday_timing'][1];

            $branch['sat_start_time'] = $branch['saturday_timing'][0];
            $branch['sat_end_time'] = $branch['saturday_timing'][1];

            $branch['ph_start_time'] = $branch['ph_timing'][0];
            $branch['ph_end_time'] = $branch['ph_timing'][1];

            unset($branch['ph_timing']);
            unset($branch['sunday_timing']);
            unset($branch['mon_fri_timing']);

            Branch::create( array_merge($branch,  ['institute_id' => $institute->id] ));
        }

        return $this->setData($institute)->response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institute = Institute::with(['logo' => function($q){
            $q->select('id','path', 'thumbnails');

        },
        'branches'=>function($q){
            $q->with(['services']);
        }])->findOrFail($id);


        return $this->setData([
            'institute' => $institute,
        ])
        ->response();
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

        $institute                          = Institute::findOrfail($id);

        # check Pwermisison
        app('permission')->throwExceptionUpdatingOtherInstitue($institute->id);

        if($request->hasFile('logo.file')) {
            $institute->logo()->addMedia($request->logo, 'institute', false);
        }

        $institute->update($request->only(['name','registration_no','institute_category_id','enable_roster']));

        Branch::where('institute_id', $institute->id)->delete();

        if($request->branches){
            foreach ($request->branches as $key => $branch) {

                $branch_id = isset($branch['id']) ? $branch['id'] : null;
                $branch_model =  $branch_id ? Branch::withTrashed()->find($branch_id) :
                                Branch::withTrashed()
                                ->where(['institute_id' => $institute->id, 'branch_code' => $branch['branch_code']])
                                ->first();

                $branch['mon_fri_start_time'] = @$branch['mon_fri_timing'][0];
                $branch['mon_fri_end_time'] = @$branch['mon_fri_timing'][1];

                $branch['sun_start_time'] = @$branch['sunday_timing'][0];
                $branch['sun_end_time'] = @$branch['sunday_timing'][1];

                $branch['sat_start_time'] = @$branch['saturday_timing'][0];
                $branch['sat_end_time'] = @$branch['saturday_timing'][1];

                $branch['ph_start_time'] = @$branch['ph_timing'][0];
                $branch['ph_end_time'] = @$branch['ph_timing'][1];

                $branch['service_ids'] = \App\Lib\SgApp::arrayValToInt($branch['service_ids']);

                unset($branch['ph_timing']);
                unset($branch['sunday_timing']);
                unset($branch['mon_fri_timing']);

                if($branch_model) {

                    $branch_model->update(array_merge($branch, ['deleted_at' => null]));
                }
                else {
                    Branch::create( array_merge($branch, ['institute_id' => $institute->id]));
                }
            }

        }

        return $this->setData($institute)->response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $institute = Institute::findOrfail($id);

        # check Pwermisison
        app('permission')->throwExceptionUpdatingOtherInstitue($institute->id);

        $institute->deleted_at ? $institute->forceDelete() : $institute->delete();
        return $this->setMessage('Institute has been deleted successfully.')->response(200);

    }

    /***
     * To restore the soft deleted Certificate
     */
    public function restore(Request $request,$id){

        $institute = Institute::where('id',$id);
        # check Pwermisison
        app('permission')->throwExceptionUpdatingOtherInstitue($institute->id);

        $institute->restore();
        $message = 'Institute has been restore  successfully.';
        return $this->setMessage($message)->response(200);
    }
    /**
     * To get Institute All Employees
     */
    public function getInstituteAllEmployee(Request $request, $institute_id) {

        $institute = Institute::findOrFail($institute_id);
        # check Pwermisison
        app('permission')->throwExceptionUpdatingOtherInstitue($institute->id);

        $employees = $institute->users()->select(
            'id',
            'name',
            'service_ids',
            'branch_ids',
            'ahpc',
            'ahpc_expiry_date',
            'additional_informations'
        )->with('profileImage','canWorkAt', 'services');

        return $this->setData([
            'employees' => $employees->get()
        ])
        ->response();
    }

    /**
     * Validate  the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */

    protected function validation(Request $request,$id=NULL)
    {

        $request->validate([
            'name'                              => ['required','string','max:500'],
            'registration_no'                   => ['required','unique:institutes,registration_no,'.$id.',id','max:100'],
            'institute_category_id'             => ['required'],
            'enable_roster'                     => ['required'],
            'branches.*.name'                   => ['required'],
            'branches.*.branch_code'            => ['required',new UniqueArrayValue,'max:10'],
            'branches.*.address'                => ['required'],
            'branches.*.mon_fri_timing.*'       => ['date_format:H:i:s'],
            'branches.*.saturday_timing.*'      => ['date_format:H:i:s'],
            'branches.*.sunday_timing.*'        => ['date_format:H:i:s'],
            'branches.*.ph_timing.*'            => ['date_format:H:i:s'],
            'branches.*.service_ids'            => ['required'],
        ]);
    }
}
