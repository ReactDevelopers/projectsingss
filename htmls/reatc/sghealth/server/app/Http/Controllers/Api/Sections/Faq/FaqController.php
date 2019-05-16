<?php

namespace App\Http\Controllers\Api\Sections\Faq;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\ModelFilters\Universal\FaqFilter;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $faq = Faq::filter($request->all(),FaqFilter::class)->paginate($request->page_size);

        return $this->setData($faq)->response(200);
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
        
        $request->request->add(['creator_id'=>\Auth::User()->id]);
        $faq   = Faq::create($request->all());

        return $this->setData($faq)->response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faq::findOrFail($id);
        return $this->setData(['faq'=>$faq])->response(200);
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

        $faq                = Faq::findOrfail($id);
        $faq->update($request->all());

        return $this->setData($faq)->response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Validate  the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */

    protected function validation(Request $request)
    {
        $request->validate([
            'subject'                           => ['required','string'],
            'question'                          => ['required','string'],
            'answer'                            => ['required'],
        ]);
    }
}
