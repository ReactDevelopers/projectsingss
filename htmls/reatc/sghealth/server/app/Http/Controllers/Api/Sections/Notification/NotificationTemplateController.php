<?php

namespace App\Http\Controllers\Api\Sections\Notification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NotificationTemplate;
use App\ModelFilters\Universal\NotificationTemplateFilter;
use Illuminate\Validation\Rule;

class NotificationTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $template =  NotificationTemplate::filter($request->all(),NotificationTemplateFilter::class)->paginate($request->page_size);
        return $this->setData($template)
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

        $template = NotificationTemplate::create($request->all());
        return $this->setData($template)->response(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $template = NotificationTemplate::findOrFail($id);
        return $this->setData(['template'=>$template])->response(200);

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

        $template = NotificationTemplate::updateOrCreate(['name'=>$request->name],$request->all());

        \Cache::forget('notification_template.'. $template->name);
        return $this->setData($template)->response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NotificationTemplate::where('id',$id)->delete();
        return $this->setMessage('Template deleted successfully.')->response(200);
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
            'name'              => ['required','unique:notification_templates,name,'.$id],
            'subject'           => ['required'],
            'body'              => ['required'],
            'type'              => ['required',Rule::in('sms','email')],
            'options.variables' => ['required','array']
        ]);
    }
}
