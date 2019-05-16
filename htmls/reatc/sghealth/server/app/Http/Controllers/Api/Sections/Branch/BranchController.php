<?php

namespace App\Http\Controllers\Api\Sections\Branch;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Institute;
use App\Models\User;
use App\ModelFilters\Universal\BranchFilter;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $branch = Branch::filter($request->all(), BranchFilter::class);

        $branch = $request->page == "-1"  ? ['data' => $branch->get()] : $branch->paginate($request->page_size);

        return $this->setData($branch)
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

        $institute = Institute::find($request->institute_id);

        $institute->branches()->create($request->all());

        return $this->setData($institute)->response(200);
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

        $institute = Institute::find($request->institute_id);

        $institute->branches()->updateOrCreate(['id'=> $id],$request->all());

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
        if($request->check) {

            return $this->checkToDelete($request,$id);
        } else {
            $branch = Branch::where('id',$id)->count();
            
            if($branch > 0) {

                return $this->softDeleteRecord($request,$id);
                
            } else {

                return $this->hardDeteleRecord($request,$id);
                
            }
        }

    }

    /**
     * validate record for being deleted
     *
     * @param   $request,$id
     * @return \Illuminate\Http\Response
     */
    private function checkToDelete($request,$id){

        $user_count = User::where('branch_id',$id)->count();

        $message = 'Are you sure you want to delete? '.$user_count.' users  are linked with this branch.';
        return $this->setMessage($message)->response(200);
    }

    /**
     * soft delete the  record 
     *
     * @param    $request,$id
     * @return \Illuminate\Http\Response
     */
    private function softDeleteRecord($request,$id){

        $services = Branch::where('id',$id);
        $services->delete();

        $message = 'Branch has been deleted successfully.';
        return $this->setMessage($message)->response(200);
    }

    /**
     * hard delete the  record 
     *
     * @param    $request,$id
     * @return \Illuminate\Http\Response
     */
    private function hardDeteleRecord($request,$id){

        $institute = Branch::where('id',$id);
        $institute->forceDelete();

        $message = 'Branch has been permanent deleted successfully.';
        return $this->setMessage($message)->response(200);
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
            'institute_id'           => ['required'],
            'name'                   => ['required'],
            'branch_code'            => ['required','max:10','unique:branches,branch_code,'.$id.',id,institute_id,'.$request->institute_id],
            'address'                => ['required'],
            'mon_fri_start_time'     => ['required','date_format:H:i'],
            'mon_fri_end_time'       => ['required','date_format:H:i'],
            'sun_start_time'         => ['required','date_format:H:i'],
            'sun_end_time'           => ['required','date_format:H:i'],
            'sat_start_time'         => ['required','date_format:H:i'],
            'sat_end_time'           => ['required','date_format:H:i'],
            'ph_start_time'          => ['required','date_format:H:i'],
            'ph_end_time'            => ['required','date_format:H:i'],
            'service_ids'            => ['required'],
        ]);
    }

}
