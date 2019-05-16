<?php

namespace App\Http\Controllers\Api\Sections\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\ModelFilters\Universal\PostFilter;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::filter($request->all(),PostFilter::class)->paginate($request->page_size);
        return $this->setData($posts)->response(200);
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

        $posts = Post::create($request->all());

        return $this->setData($posts)->response(200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);

        return $this->setData($posts)->response(200);
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

        $posts = Post::find($id);

        $posts->name            = $request->name;
        $posts->post_type_id    = $request->post_type_id;
        $posts->title           = $request->title;
        $posts->content         = $request->content;
        $posts->options         = $request->options;

        $posts->save();

        return $this->setData($posts)->response(200);
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
            $certificate = Post::where('id',$id)->count();
            
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


    }

    /**
     * soft delete the  record 
     *
     * @param    $request,$id
     * @return \Illuminate\Http\Response
     */
    private function softDeleteRecord($request,$id){

        $services = Post::where('id',$id);
        $services->delete();

        $message = 'Static Content has been deleted successfully.';
        return $this->setMessage($message)->response(200);
    }

    /**
     * hard delete the  record 
     *
     * @param    $request,$id
     * @return \Illuminate\Http\Response
     */
    private function hardDeteleRecord($request,$id){

        $institute = Post::where('id',$id);
        $institute->forceDelete();

        $message = 'Static Content has been permanent deleted successfully.';
        return $this->setMessage($message)->response(200);
    }

    /***
     * To restore the soft deleted Certificate
     */
    public function restore(Request $request,$id){
        
        $user = Post::where('id',$id);
        $user->restore();

        $message = 'Static Content has been restore  successfully.';
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
            'post_type_id'           => ['required'],
            'name'                   => ['required','unique:posts,name,'.$id.',id,deleted_at,NULL'],
            'title'                  => ['required'],
            'content'                => ['required'],
            'options'                => ['array'],
        ]);
    }
}
