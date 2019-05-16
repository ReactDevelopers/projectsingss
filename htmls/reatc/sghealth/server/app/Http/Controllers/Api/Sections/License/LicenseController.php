<?php

namespace App\Http\Controllers\Api\Sections\License;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\License;
use App\ModelFilters\Universal\LicenseFilter;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $licenses = License::filter($request->all(), LicenseFilter::class);
        return $this->setData(['data' => $licenses->get()])->response();
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

        // $request->request->add(['creator_id'=>\Auth::User()->id]);
        $license   = License::create($request->all());

        return $this->setData($license)->response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $license = License::where('id',$id)->first();

        return $this->setData(['licenses'=>$license])->response();
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

        $license                = License::findOrfail($id);
        $license->update($request->all());

        return $this->setData($license)->response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        License::where('id',$id)->delete();

        return $this->setMessage('License deleted successfully.')->response(200);
    }

    protected function validation(Request $request)
    {
        $request->validate([
            'name'                           => ['required','string','max:50'],
        ]);
    }
}
