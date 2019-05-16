<?php

namespace App\Http\Controllers\Api\Sections\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserCertificate;
use App\Models\Certificate;
use App\ModelFilters\Universal\UserCertificateFilter;
use Illuminate\Validation\Rule;
use App\Rules\UniqueArrayValue;
use App\Exports\UserCertificateExport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Notifications\SendUserCertEmail;


class UserCertificateController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_certs = UserCertificate::filter($request->all(), UserCertificateFilter::class);

        # Check permission
        if(app('permission')->hasTag('only_my_institute')) {

            $institute_ids = Auth::user()->institute_ids;
            if($institute_ids) {

                $user_certs->whereIn('users.institute_ids', $institute_ids);
            }
            else {
                $user_certs->where('users.id', -1);
            }

        } else if( app('permission')->hasTag('only_my')) {

            $user_certs->where('users.id', \Auth::id());
        }

        if($user_certs->count() > 0){

            if($request->export){
                $message =   $this->exportCertificate($user_certs->get()->toArray());
            }else{
                $message = 'Certificate List';
            }
        }else{
            $message = "No reords found";
        }

        $user_certs = $user_certs->paginate($request->page_size);

        return $this->setData($user_certs)->setMessage($message)->response(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->user_id ? $request->user_id : \Auth::user()->id;
        $user = \App\Models\User::findOrFail($user_id);

        if(app('permission')->hasTag('only_my_institute')) {

            app('permission')->throwExceptionInstituteNotMatched('only_my_institute', $user);

        } else if(app('permission')->hasTag('only_my')) {

            $user_id = \Auth::user()->id;
        }

        $this->validation($request, null, $user_id);

        $data = $request->only(['certificate_id','expiry_date','cert_info','certified_on']);

        $data['cert_info'] = isset($data['cert_info']) && $data['cert_info'] ? $data['cert_info'] : '';
        $data['user_id'] = $user_id;

        $user_cert = UserCertificate::create($data);

        if($request->has('documents.file')){
            $user_cert->documents()->addMedia($request->documents,'user_certificates');
        }

        return $this->setData($user_cert)->setMessage('Certificate added successfully.')->response(200);
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
        $user_cert = UserCertificate::findOrfail($id);

        $user = \App\Models\User::find($user_cert->user_id);

        if(app('permission')->hasTag('only_my_institute')) {

            app('permission')->throwExceptionInstituteNotMatched('only_my_institute', $user);

        } else if(app('permission')->hasTag('only_my')) {

            if($user_cert->user_id != \Auth::id() ) {
                abort(403);
            }
        }

        $this->validation($request, $id, $user_cert->user_id);


        if($request->has('documents.file')){
            $user_cert->documents()->addMedia($request->documents, 'user_certificates');
        }

        $user_cert->update($request->only(['user_id','certificate_id','expiry_date','certified_on','cert_info','is_valid']));
        return $this->setData($user_cert)->setMessage('Certificate updated successfully')->response(200);
    }

    /**
     * Remove the specified resource from storage.
     * @security_tags [delete_all_user_certificates]
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user_cert = UserCertificate::findOrfail($id);
        $user = \App\Models\User::find($user_cert->user_id);

        if(app('permission')->hasTag('only_my_institute')) {

            app('permission')->throwExceptionInstituteNotMatched('only_my_institute', $user);

        } else if(app('permission')->hasTag('only_my')) {

            if($user_cert->user_id != \Auth::id() ) {
                abort(403);
            }
        }
        $user_cert->delete();

        return $this->setData($user_cert)->setMessage('certificate has been deleted successfully.')->response(200);

    }

    /**
     * arrange the ordering of the certificate
     * @security_tags [delete_all_user_certificates]
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reArrangeCertificate(Request $request)
    {
        $this->validateOrdering($request);

        foreach($request->ordering as $key => $value){

            $user_cert = UserCertificate::findOrfail($key);
            $user = \App\Models\User::find($user_cert->user_id);

            if(app('permission')->hasTag('only_my_institute')) {

                app('permission')->throwExceptionInstituteNotMatched('only_my_institute', $user);

            } else if(app('permission')->hasTag('only_my')) {

                if($user_cert->user_id != \Auth::id() ) {
                    abort(403);
                }
            }

            $user_cert->update(['order'=>$value]);
        }


        return $this->setData($user_cert)->setMessage('Certificate order has been set successfully.')->response(200);

    }

    /**
     * Validate  the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */

    protected function validation(Request $request, $id=NULL, $user_id)
    {

        if($request->certificate_id){
            $unique_rule = Rule::unique('user_certificates')->where('user_id', $user_id);

            if($id){
                $unique_rule->ignore($id);
            }

        }else{
            $unique_rule = '';
        }
        /***
         * validate license
         */
        if($user_id != \Auth::id() && \Auth::User()->role_id == 1){
            $required = 'required';
        }else{
            $required = 'nullable';
        }

        /**
         * check for required documennt
         */

        $isRequired = Certificate::find($request->certificate_id);
        $hasDocument = UserCertificate::find($id);

        if($id == null  && $isRequired && $isRequired->upload_document == 'true' && $hasDocument['docs'] == null){
            $requiredDocumnet = 'required';

        }else{
            $requiredDocumnet = 'nullable';
        }

        $request->validate([
            'is_valid'              => [$required],
            'cert_info'             => ['nullable','string', 'max:100'],
            'certificate_id'        => [ $unique_rule],
            'expiry_date'           => ['required','date : Y-m'],
            'certified_on'          => ['required','date : Y-m-d'],
            'documents.file'        => [$requiredDocumnet],
        ]);
    }

    /**
     * Validate  the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */

    protected function validateOrdering(Request $request)
    {

        $request->validate([
            'ordering.*'              => ['required','distinct'],
        ]);
    }

    /***
     * export user certificates
     */
    private function exportCertificate($certData){

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();


        foreach(range('A','F') as $column){
            $sheet->getColumnDimension($column)->setWidth($column == 'E' ? 30: 20);
        }

        $sheet->setCellValue('A1', 'Certificate Type');
        $sheet->setCellValue('B1', 'Certificate Info');
        $sheet->setCellValue('C1', 'Certified On');
        $sheet->setCellValue('D1', 'Expiry Date');
        $sheet->setCellValue('E1', 'Document');
        $sheet->setCellValue('F1', 'Valid');

        foreach($certData as $key => $value){

            $sheet->getRowDimension($key+2)->setRowHeight(200);

            $sheet->setCellValue('A'.($key+2), $value['certificate'] ? '' : 'Other');
            $sheet->setCellValue('B'.($key+2), $value['cert_info'] );
            $sheet->setCellValue('C'.($key+2), $value['certified_on'] );
            $sheet->setCellValue('D'.($key+2), $value['expiry_date']);

            if(!empty($value['documents'])){
                // $doc_url = '<a href="'. asset('storage/'.$value['documents'][0]['path']).'" target="_blank>Open Document</a>';
                // $sheet->getCellByColumnAndRow(5,($key+2))->getHyperlink()->setUrl(asset('storage/'.$value['documents'][0]['path']));

                $orig = null;

                if(strtolower($value['documents'][0]['type']) == 'image/png' ){

                    $orig = imagecreatefrompng(asset('storage/'.$value['documents'][0]['path']));

                } else if(strtolower($value['documents'][0]['type']) == 'image/jpg'  || strtolower($value['documents'][0]['type']) == 'image/jpeg' ){

                    $orig = imagecreatefromjpeg(asset('storage/'.$value['documents'][0]['path']));

                } else{
                    $sheet->setCellValue('E'.($key+2), asset('storage/'.$value['documents'][0]['path']));
                }

                if($orig){

                    // Resample image

                    $imgWidth = imagesx($orig);
                    $imgHeight = imagesy($orig);

                    $target = imagecreatetruecolor(200, 200);

                    imagealphablending($target, false);
                    imagesavealpha($target, true);

                    imagecopyresized($target, $orig, 0, 0, 0, 0, 200, 200, $imgWidth, $imgHeight);

                    // Add image to sheet
                    $objDrawing = new MemoryDrawing();
                    $objDrawing->setWidth(200);
                    $objDrawing->setHeight(200);
                    $objDrawing->setWidthAndHeight(200,200);
                    $objDrawing->setName('Document');
                    $objDrawing->setDescription('Document');
                    $objDrawing->setImageResource($target);
                    $objDrawing->setRenderingFunction(MemoryDrawing::RENDERING_PNG);
                    $objDrawing->setMimeType(MemoryDrawing::MIMETYPE_DEFAULT);
                    $objDrawing->setCoordinates("E".($key+2));
                    $objDrawing->setWorksheet($sheet);
                }

            }

            $sheet->setCellValue('F'.($key+2), $value['is_valid'] == 'true' ? 'Yes' : 'No' );
        }
        $writer = new Xlsx($spreadsheet);
        $path = 'storage/'.strtotime(date('Y-m-d H:i:s')).'_user_certificate.xlsx';
        $writer->save($path);

        $user = auth()->user();
        $user->notify(new SendUserCertEmail($path) );

        unlink(public_path($path));
        return "Certificate exported succesfully.Please check your mail inbox.";
    }
}
