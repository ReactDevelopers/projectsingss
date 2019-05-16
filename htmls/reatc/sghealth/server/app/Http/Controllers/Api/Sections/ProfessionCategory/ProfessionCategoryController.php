<?php

namespace App\Http\Controllers\Api\Sections\ProfessionCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfessionCategory;
use App\Models\Profession;
use App\Models\User;
use App\ModelFilters\Universal\ProfessionCategoryFilter;
use App\Rules\UniqueAttributeWithTrashed;


class ProfessionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $profession_cat = ProfessionCategory::filter($request->all(), ProfessionCategoryFilter::class);

        $profession_cat = $request->page == "-1"  ? ['data' => $profession_cat->get()] : $profession_cat->paginate($request->page_size);

        return $this->setData($profession_cat)
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


        $profession_cat = ProfessionCategory::create([
                        'name'  => $request->name,
                    ]);

        if($request->hasFile('icon.file')) {
            $profession_cat->icon()->addMedia($request->icon, 'profession-category');
        }

        return $this->setData($profession_cat)->response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profession_cat = ProfessionCategory::with(['icon'])->findOrFail($id);

        return $this->setData([
            'profession_category' => $profession_cat,
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

        $profession_cat                             = ProfessionCategory::find($id);
        $profession_cat->name                       = $request->name;
        $profession_cat->save();

        if($request->hasFile('icon.file')) {
            $profession_cat->icon()->addMedia($request->icon, 'profession-category');
        }

        return $this->setData($profession_cat)->response(200);
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
            $profession_cat = ProfessionCategory::where('id',$id)->count();

                
            if($profession_cat > 0) {
                
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

        $profession_count = Profession::where('profession_category_id',$id);
        
        if($profession_count->count() > 0) {
            $user_count = User::where('profession_id',$profession_count->first()->id)->count();
            $message = 'Are you sure you want to delete? '.$profession_count->count().' profession and '.$user_count.' users are linked with this profession.';
            
        } else {
            
            $message = 'Are you sure you want to delete? '.$profession_count->count().' profession are linked with this profession.';
        }

        return $this->setMessage($message)->response(200);
    }

    /**
     * soft delete the  record 
     *
     * @param    $request,$id
     * @return \Illuminate\Http\Response
     */
    private function softDeleteRecord($request,$id){

        $profession_cat = ProfessionCategory::where('id',$id);
        $profession_cat->delete();

        $message = 'Profession Category has been deleted successfully.';
        return $this->setMessage($message)->response(200);
    }

    /**
     * hard delete the  record 
     *
     * @param    $request,$id
     * @return \Illuminate\Http\Response
     */
    private function hardDeteleRecord($request,$id){

        $profession_cat = ProfessionCategory::where('id',$id);
        $profession_cat->forceDelete();

        $message = 'Profession Category has been permanent deleted successfully.';
        return $this->setMessage($message)->response(200);
    }

    /***
     * To restore the soft deleted Profession Category
     */
    public function restore(Request $request,$id){

        $user = ProfessionCategory::where('id',$id);
        $user->restore();

        $message = 'Profession Category has been restore  successfully.';
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
            'name'                              => ['required','string',new UniqueAttributeWithTrashed($id,'App\Models\ProfessionCategory'),'max:255'],
        ]);
    }

}
