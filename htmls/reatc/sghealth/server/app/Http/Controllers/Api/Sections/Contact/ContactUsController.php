<?php

namespace App\Http\Controllers\Api\Sections\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\User;
use App\ModelFilters\Universal\ContactUsFilter;
use App\Notifications\ContactUsReply;
use App\Mail\ContactUsReplyMail;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contact_list = ContactUs::filter($request->all(),ContactUsFilter::class)->paginate($request->page_size);
        return $this->setData($contact_list)->response(200);
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

        $request->request->add(['user_id'=>\Auth::id(),'email'=>auth()->user()->email]);

        $contact = ContactUs::create($request->only(['subject','user_id','email','body']));

        return $this->setMessage('Query Submitted successfully.')->response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = ContactUs::findOrFail($id);

        return $this->setData(['contact'=>$contact])->response(200);
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
        $contact = ContactUs::findOrFail($id);

        $contact->replied = $request->replied;
        $contact->save();

        $user = User::findOrFail($contact->user_id);
        $user->notify(new ContactUsReply($contact) );

        return $this->setMessage('Reply has been sent successfully.')->response(200);

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
            'subject'                => ['required','max:150'],
            'body'                   => ['required','max:200'],
        ]);
    }
}
