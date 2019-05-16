<?php

namespace App\Http\Controllers\Api\Sections\Cpd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cpd;
use App\ModelFilters\Universal\CpdFilter;
use PDF;
use App\Notifications\CpdExportNotify;

class CpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cpd = Cpd::filter($request->all(), CpdFilter::class);
        $cpd = $request->page == "-1"  ? ['data' => $cpd->get()] : $cpd->paginate($request->page_size);

        return $this->setData($cpd)

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

        $cpd = Cpd::create([
                        'user_id'       => \Auth::id(),
                        'code'          => $request->code,
                        'cpd_credit'    => $request->cpd_credit,
                        'title'         => $request->title,
                        'description'   => $request->description,
                        'role'          => $request->role ? $request->role : "",
                        'date'          => $request->date,
                    ]);

        if($request->hasFile('document')) {
            $cpd->document()->addMedia($request->document, 'cpd');
        }

        return $this
                ->setData($cpd)
                ->setMessage('CPD added successfully')->response(200);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validation($request,$id);

        $cpd                            = Cpd::find($id);
        $cpd->user_id                   = \Auth::id();
        $cpd->code                      = $request->code;
        $cpd->cpd_credit                = $request->cpd_credit;
        $cpd->title                     = $request->title;
        $cpd->description               = $request->description;
        $cpd->role                      = $request->role ? $request->role : "";
        $cpd->date                      = $request->date;
        $cpd->save();

        if($request->hasFile('document')) {
            $cpd->document()->addMedia($request->document, 'cpd');
        }

        return $this->setData($cpd)->setMessage('CPD updated successfully')->response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cpd = Cpd::findOrfail($id);

        if($cpd->user_id != \Auth::id() ) {

        }

        $cpd->delete();

        return $this->setData($cpd)->setMessage('CPD has been deleted successfully.')->response(200);
    }

    /**
     * Display a listing of the users authenticated.
     *
     * @return \Illuminate\Http\Response
     */
    public function myCpd(Request $request)
    {
        $cpd = Cpd::filter($request->all(), CpdFilter::class);
        $cpd->where('user_id', \Auth::id());

        if($request->export){
            $message =   $this->exportCpd($cpd->with(['document'])->where('cpd.user_id',\Auth::id())->get()->toArray());
        }else{
            $message = 'CPD List';
        }


        $cpd = $request->page == "-1"  ? ['data' => $cpd->get()] : $cpd->paginate($request->page_size);

        return $this->setData($cpd)
            ->setMessage($message)
            ->response();
    }

    /**
     * Function to generate pdf for the CPD and send attachement to email
     */
    public function exportCpd($cpd_data){
        if($cpd_data){

            $pdf = PDF::loadView('pdf.cpd_pdf',array('data'=>$cpd_data));

            // $pdf->setPaper('a4', 'potrait');
            $pdf =  $pdf->stream('cpd.pdf');

            $user = auth()->user();
            return $user->notify(new CpdExportNotify($pdf) );
        } else {
            return 'No CPD Found';
        }
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
            'code'                  => ['required','max:20'],
            'cpd_credit'            => ['required','max:10000','integer'],
            'title'                 => ['required','max:255'],
            'description'           => ['required','max:255'],
            'role'                  => ['nullable','max:255'],
            'date'                  => ['required'],
            'document.file'         => [$id ? 'nullable':'required'],
        ]);
    }
}
