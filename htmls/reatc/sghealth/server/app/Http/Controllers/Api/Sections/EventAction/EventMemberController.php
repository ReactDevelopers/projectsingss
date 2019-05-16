<?php

namespace App\Http\Controllers\Api\Sections\EventAction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class EventMemberController extends Controller
{
    /**
     * Display a listing of the event members on basis of status i.e waiting list,awaiting-payment,confirm,reject.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        $event = Event::findOrfail($id);
        #Check Permission
        app('permission')->throwExceptionUpdatingOtherEvent($event->manager_id);

        $members =  $event
            ->members()
            ->select(['application_event.status as member_status',
                'application_event.id as application_event_id',
                'application_event.attendance',
                'application_event.is_winner',
                'users.*'
            ]);

        if($request->status){
            $members = $members->where('application_event.status', $request->status);
        }

        if($request->register_as_lucky_draw){
            $members = $members->where('application_event.register_as_lucky_draw', $request->register_as_lucky_draw);
        }

        if($request->search){
            $members = $members
            ->WhereRaw('(users.name LIKE "%'.$request->search.'%" OR users.email LIKE "%'.$request->search.'%")');
        }

        $members = $members->get();

        if($request->export){
            return $this->exportMemberList($members);
        }
        return $this->setData(['data' => $members])
            ->response();
    }

    /**
     * Export the member list of the event
     *
     * @return \Illuminate\Http\Response
     */
    protected function exportMemberList($data)
    {
        $user_data = json_decode(json_encode($data),true);

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();


        foreach(range('A','D') as $column){
            $sheet->getColumnDimension($column)->setWidth(30);
        }

        $sheet->setCellValue('A1', 'Name');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Status');
        $sheet->setCellValue('D1', 'Attendance');

        foreach($user_data as $key => $value){
            $sheet->setCellValue('A'.($key+2), $value['name']  ? $value['name']  : 'N/A');
            $sheet->setCellValue('B'.($key+2), $value['email'] );
            $sheet->setCellValue('C'.($key+2), $value['member_status'] );
            $sheet->setCellValue('D'.($key+2), $value['attendance'] ? $value['attendance'] : 'N/A');


        }

        header("Access-Control-Allow-Origin: *");
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8');

        // We'll be outputting an excel file
        // header('Content-type: application/vnd.ms-excel');

        // // It will be called file.xls
        header('Content-Disposition: attachment; filename="file.xlsx"');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
