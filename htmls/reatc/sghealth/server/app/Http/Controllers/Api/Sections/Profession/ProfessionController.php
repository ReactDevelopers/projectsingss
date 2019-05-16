<?php

namespace App\Http\Controllers\Api\Sections\Profession;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profession;
use App\Models\User;
use App\ModelFilters\Universal\ProfessionFilter;
use App\Rules\UniqueAttributeWithTrashed;


class ProfessionController extends Controller {

     /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        
        $profession = Profession::filter($request->all(), ProfessionFilter::class);

        $profession = $request->page == "-1"  ? ['data' => $profession->get()] : $profession->paginate($request->page_size);

        return $this->setData($profession)
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


        $profession = Profession::create([
                        'name'                      => $request->name,
                        'description'               => $request->description,
                        'profession_category_id'    => $request->profession_category_id,
                        'options'                   => $request->options
                    ]);

        return $this->setData($profession)->response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profession = Profession::with(['category'])->findOrFail($id);

        return $this->setData([
            'profession' => $profession,
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

        $profession                             = Profession::find($id);
        $profession->name                       = $request->name;
        $profession->description                = $request->description;
        $profession->profession_category_id     = $request->profession_category_id;
        $profession->options                    = $request->options;

        $profession->save();

        return $this->setData($profession)->response(200);
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
        }
        else{
            $profession = Profession::where('id',$id)->count();
                
            if($profession > 0) {
                
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

        $user_count = User::where('profession_id',$id)->count();

        $message = 'Are you sure you want to delete? '.$user_count.' users are linked with this profession.';
        return $this->setMessage($message)->response(200);
    }

    /**
     * soft delete the  record 
     *
     * @param    $request,$id
     * @return \Illuminate\Http\Response
     */
    private function softDeleteRecord($request,$id){

        $profession = Profession::where('id',$id);
        $profession->delete();

        $message = 'Profession has been deleted successfully.';
        return $this->setMessage($message)->response(200);
    }

    /**
     * hard delete the  record 
     *
     * @param    $request,$id
     * @return \Illuminate\Http\Response
     */
    private function hardDeteleRecord($request,$id){

        $profession = Profession::where('id',$id);
        $profession->forceDelete();

        $message = 'Profession has been permanent deleted successfully.';
        return $this->setMessage($message)->response(200);
    }

    /***
     * To restore the soft deleted InstituteCategory
     */
    public function restore(Request $request,$id){

        $user = Profession::where('id',$id);
        $user->restore();

        $message = 'Profession has been restore  successfully.';
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
            'name'                              => ['required','string',new UniqueAttributeWithTrashed($id,'App\Models\Profession'),'max:255'],
            'profession_category_id'            => ['required'],
            'options.isMultipleInstitute'       => ['required'],
            'options.can_work_at'               => ['required'],
            'description'                       => ['required','string','max:255']
        ]);
    }
}
