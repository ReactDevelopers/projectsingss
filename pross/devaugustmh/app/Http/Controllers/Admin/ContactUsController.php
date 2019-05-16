<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Contact;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data['page_title'] = 'Contact Us';
        return view('admin.list.contact')->with($data);
    }

    public function getContact(Request $request)
    {
        
        return \Datatables::of(Contact::select(array('id','user_name','user_email', 'subject', 'message', 'created_at', \DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as created_attb"))))->make(true);
         
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
        $data['page_title'] = 'Contact Reply';
        
        $data['contact'] = Contact::select(['id','user_name','user_email','subject','message'])->where(['id'=>$id])->first();

        return view('admin.forms.contact-reply')->with($data);
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
                'reply' => 'required',
                ],
                [
                    'reply.required' => 'Please enter Reply.',
                ]
        );
        
        $emailData['reply'] = $request->reply;
        $emailData['name'] = $request->user_name;
        
        send_email($request->email,sprintf("%s",$request->user_name),'contact_us_reply',$emailData);
        
        $request->session()->flash('success', 'Contact Us reply send successfully.');
        return redirect('contactus');
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

    public function delete(Request $request, $id)
    {
        Contact::where('id', $id)->delete();
        $request->session()->flash('success', 'Contact Us deleted successfully.');
    }
}
