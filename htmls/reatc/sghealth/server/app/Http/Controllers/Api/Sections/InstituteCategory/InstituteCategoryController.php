<?php

namespace App\Http\Controllers\Api\Sections\InstituteCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InstituteCategory;
use App\Models\Institute;
use App\ModelFilters\Universal\InstituteCategoryFilter;
use App\Rules\UniqueAttributeWithTrashed;

class InstituteCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $institute_categories = InstituteCategory::filter($request->all(), InstituteCategoryFilter::class);

        $institute_categories = $request->page == "-1"  ? ['data' => $institute_categories->get()] : $institute_categories->paginate($request->page_size);

        return $this->setData($institute_categories)
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

        $institute_cat = InstituteCategory::create([
                        'name'      => $request->name,
                    ]);

        if($request->hasFile('icon.file')) {
            $institute_cat->icon()->addMedia($request->icon, 'institute-category');
        }

        return $this->setData($institute_cat)->response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institute_category = InstituteCategory::with(['icon'])->findOrFail($id);

        return $this->setData([
            'institute_category' => $institute_category,
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

        $institute_cat                          = InstituteCategory::find($id);
        $institute_cat->name                    = $request->name;

        $institute_cat->save();

        if($request->hasFile('icon.file')) {
            $institute_cat->icon()->addMedia($request->icon, 'institute-category');
        }

        return $this->setData($institute_cat)->response(200);
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
            $institute_cat = InstituteCategory::where('id',$id)->count();

            if($institute_cat > 0) {
                
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

        $institute_count     = Institute::where('institute_category_id',$id)->count();

        $message = 'Are you sure you want to delete? '.$institute_count.' institutes are linked with this  category.';
        return $this->setMessage($message)->response(200);
    }

    /**
     * soft delete the  record 
     *
     * @param    $request,$id
     * @return \Illuminate\Http\Response
     */
    private function softDeleteRecord($request,$id){

       $institute = InstituteCategory::where('id',$id);
       $institute->delete();

        $message = 'Institute has been deleted successfully';
        return $this->setMessage($message)->response(200);
    }

    /**
     * hard delete the  record 
     *
     * @param    $request,$id
     * @return \Illuminate\Http\Response
     */
    private function hardDeteleRecord($request,$id){

        $institute = InstituteCategory::where('id',$id);
        $institute->forceDelete();

        $message = 'Institute has been permanent deleted successfully';
        return $this->setMessage($message)->response(200);
    }

    /***
     * To restore the soft deleted InstituteCategory
     */
    public function restore(Request $request,$id){

        $user = InstituteCategory::where('id',$id);
        $user->restore();

        $message = 'Institute Category has been restore  successfully.';
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
            'name'          => ['required','string',new UniqueAttributeWithTrashed($id,'App\Models\InstituteCategory'),'max:200'],
        ]);
    }
}
