<?php

namespace App\Http\Controllers\Api\Sections\Certificate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\UserCertificate;
use App\ModelFilters\Universal\CertificateFilter;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cert = Certificate::filter($request->all(), CertificateFilter::class);

       /*  $data[] = ['id'=> null,'name'=> 'Others','title'=>'Others','upload_document'=>'true'];
        
        $data = array_merge($data,$cert->get()->toArray()); */

        $cert = $request->page == "-1"  ? ['data' => $cert->get()] : $cert->paginate($request->page_size);

        return $this->setData($cert)
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

        $cert   = Certificate::create($request->all());
        return $this->setData($cert)->response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cert = Certificate::findOrFail($id);

        return $this->setData([
            'certificate' => $cert,
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

        $cert               = Certificate::find($id);
        $cert->title        = $request->title;
        $cert->upload_document        = $request->upload_document;
        $cert->save() ;

        return $this->setData($cert)->response(200);
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
            $certificate = Certificate::where('id',$id)->count();

            if($certificate > 0) {

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

        $cert_count = UserCertificate::where('certificate_id',$id)->count();

        $message = "Are you sure you want to delete? ".$cert_count." user's certificate  are linked with this certificate.";

        return $this->setMessage($message)->response(200);
    }

    /**
     * soft delete the  record
     *
     * @param    $request,$id
     * @return \Illuminate\Http\Response
     */
    private function softDeleteRecord($request,$id){

        $services = Certificate::where('id',$id);
        $services->delete();

        $message = 'Certificate has been deleted successfully.';
        return $this->setMessage($message)->response(200);
    }

    /**
     * hard delete the  record
     *
     * @param    $request,$id
     * @return \Illuminate\Http\Response
     */
    private function hardDeteleRecord($request,$id){

        $institute = Certificate::where('id',$id);
        $institute->forceDelete();

        $message = 'Certificate has been permanent deleted successfully.';
        return $this->setMessage($message)->response(200);
    }

    /***
     * To restore the soft deleted Certificate
     */
    public function restore(Request $request,$id){

        $user = Certificate::where('id',$id);
        $user->restore();

        $message = 'Certificate has been restore  successfully.';
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
            'title'       => ['required',
                                'string',
                                'unique:certificates,title,'.$id.',id,deleted_at,NULL',
                                'max:200',
                                function ($attribute, $value, $fail) {
                                    if (strtolower($value) === 'other' || strtolower($value) === 'others') {
                                        $fail("Unable to create this certificate.");
                                    }
                                }],
        ]);
    }
}
