<?php

namespace App\Http\Controllers\Api\Sections\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use App\Models\Branch;
use App\ModelFilters\Universal\ServiceFilter;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = Service::filter($request->all(), ServiceFilter::class);
        
        $services = $request->page == "-1"  ? ['data' => $services->get()] : $services->paginate($request->page_size);

        return $this->setData($services)
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

        $services = Service::create($request->all());

        return $this->setData($services)->response(200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $services = Service::findOrFail($id);

        return $this->setData(['service'=>$services])->response(200);

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

        $services               = Service::find($id);
        $services->name         = $request->name;
        $services->short_name   = $request->short_name;
        $services->save() ;

        return $this->setData($services)->response(200);
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
            $service = Service::where('id',$id)->count();

            if($service > 0) {

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

        $user_count     = User::whereJsonContains('service_ids',[(int)$id])->count();
        $branch_count   = Branch::whereJsonContains('service_ids',[(int)$id])->count();

        $message = 'Are you sure you want to delete? '.$user_count.' users and '.$branch_count.' branches are linked with this service.';
        return $this->setMessage($message)->response(200);
    }

    /**
     * soft delete the  record
     *
     * @param    $request,$id
     * @return \Illuminate\Http\Response
     */
    private function softDeleteRecord($request,$id){

        $services = Service::where('id',$id);
        $services->delete();

        $message = 'Service has been deleted successfully.';
        return $this->setMessage($message)->response(200);
    }

    /**
     * hard delete the  record
     *
     * @param    $request,$id
     * @return \Illuminate\Http\Response
     */
    private function hardDeteleRecord($request,$id){

        $institute = Service::where('id',$id);
        $institute->forceDelete();

        $message = 'Service has been permanent deleted successfully.';
        return $this->setMessage($message)->response(200);
    }

    /***
     * To restore the soft deleted Service
     */
    public function restore(Request $request,$id){

        $user = Service::where('id',$id);
        $user->restore();

        $message = 'Service has been restore  successfully.';
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
            'name'       => ['required','string','unique:services,name,'.$id.',id,deleted_at,NULL','max:300'],
            'short_name' => ['required','string','unique:services,short_name,'.$id.',id','max:20'],
        ]);
    }
}
