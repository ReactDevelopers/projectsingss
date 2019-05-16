<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\DB;

use App\Models\Admin\EmailTemplate;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data=EmailTemplate::select('*')->get();
        // dd($data);
        $data['page_title'] = 'Email Template';
        return view('admin.list.email-template')->with($data);
    }

    public function getEmailTemplate(Request $request)
    {
        return \Datatables::of(EmailTemplate::select(['*']))->make(true); 
        // $data=EmailTemplate::select('*')->get();
        // dd($data);
        // $getEmailTemplate = EmailTemplate::all('object',['email_template_id','subject','description']);
        // $data['getEmailTemplate'] = array();
        // foreach ($getEmailTemplate as $key => $value) {
        //     $data['getEmailTemplate'][$key]['email_template_id'] = ($value->email_template_id);
        //     $data['getEmailTemplate'][$key]['subject'] = ($value->subject);
        //     $data['getEmailTemplate'][$key]['description'] = strip_tags($value->description);
        // }
        // dd($data['getEmailTemplate']);
        // return \Datatables::of($data['getEmailTemplate'])->make(true);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title'] = 'Edit Email Template';
        
        $data['template'] = EmailTemplate::select(['email_template_id','subject','description'])->where(['email_template_id'=>$id])->first();
        return view('admin.list.edit-email-template')->with($data);
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
        $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                ],
                [
                    'title.required' => 'Please enter Title.',
                    'description.required' => 'Please enter Description.',
                ]
        );

        EmailTemplate::where('email_template_id', $id)
            ->update([
                        'subject' => $request->title, 
                        'description' => $request->description,
                    ]
        );

        $request->session()->flash('success', 'Email Template updated successfully.');
        return redirect('email-template');
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
}
