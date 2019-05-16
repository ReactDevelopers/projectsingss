<?php

namespace App\Http\Controllers\Api\Sections\Institute;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InstituteLicense;
use App\Models\License;
use App\Models\Institute;
use App\ModelFilters\Universal\InstituteLicenseFilter;
use Illuminate\Validation\ValidationException;

class InstituteLicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $institute_license_expity_dates = InstituteLicense::filter($request->all(), InstituteLicenseFilter::class)
            ->get();
        $institute = Institute::find($request->institute_id);
        app('permission')->throwExceptionUpdatingOtherInstitue($institute->id);

        return $this->setData([
            'institute_license_expity_dates' => $institute_license_expity_dates,
            'licenses' => $institute->licenses()->get()
        ])->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'institute_id' => 'required',
            'license_id' => 'required',
            'license_for' => 'required|in:branch,service',
        ]);

        $license = License::find($request->license_id);
        $data = ($request->license_for == 'service') ?  ['is_service_license' => 'Yes'] : ['is_branch_license' => 'Yes'];

        if( $license->institutes()->where(array_merge($data, ['institute_id' => $request->institute_id ]) )->first() ) {

            throw ValidationException::withMessages(['license_id' => 'License is already attached.']);
        }

        $license->institutes()->syncWithoutDetaching([$request->institute_id => $data]);
        $institute = Institute::find($request->institute_id);

        return $this->setData([
            'license' => $institute->licenses()->where(['license_id' => $license->id])->first()

        ])->response();
    }


    /**
     * Update the Expire date of Licence
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $institute_license_id)
    {
        $this->validate($request, [
            'expiry_date' => 'nullable|date|date_format:Y-m-d',
            //'institute_license_id' => 'required',
            'license_id' => 'required',
            'branch_id' => 'required',
            'service_id' => 'nullable',
        ]);

        $license = License::find($request->license_id);
        $institute_license = $license->institutes()->where('institute_license.id', $institute_license_id)->first();

        app('permission')->throwExceptionUpdatingOtherInstitue($institute_license->id);

        $base_data = [
            'institute_id' => $institute_license->id,
            'institute_license_id' => $institute_license_id,
            'branch_id' => $request->branch_id,
            'license_id' => $request->license_id,
            'service_id' => null
        ];

        if($request->service_id) {

            $base_data = array_merge($base_data, ['service_id' => $request->service_id]);
        }

        $license = InstituteLicense::where($base_data)->first();

        if($license) {
            $license->update([
                'expiry_date' => $request->expiry_date,
                'updated_by' => \Auth::id()
            ]);

        } else {

            $license = InstituteLicense::create( array_merge( $base_data, [
                'expiry_date' => $request->expiry_date,
                'created_by' => \Auth::id(),
            ]));
        }

        return $this->setData([
            'license' => $license
        ])->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {

        $delete_for = $request->delete_for;
        $institute_license  = \DB::table('institute_license')->where('id', $id)->first();

        app('permission')->throwExceptionUpdatingOtherInstitue($institute_license->institute_id);

        if($delete_for == 'branch') {

            \DB::table('institute_license')->where('id', $id)->update(['is_branch_license'=> 'No']);
            $institute_license->is_branch_license = 'No';
        }
        else {

            \DB::table('institute_license')->where('id', $id)->update(['is_service_license'=> 'No']);
            $institute_license->is_service_license = 'No';
        }

        if( $institute_license->is_service_license == 'No' && $institute_license->is_branch_license == 'No') {

            \DB::table('institute_license')->where('id', $id)->delete();
        }


        return $this->setData([
            'institute_license' => $institute_license
        ])->response();
    }
}
