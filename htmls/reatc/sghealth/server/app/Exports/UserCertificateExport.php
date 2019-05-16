<?php

namespace App\Exports;

use App\Models\UserCertificate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class UserCertificateExport implements FromView
{
    use Exportable;

    protected $certificate_ids;

    public function __construct($certificate_ids){
        $this->certificate_ids = $certificate_ids;
    }


    public function view(): View
    {
        return view('front.export', [
            'certs' => UserCertificate::with(['documents','certificate'])->whereIn('id',$this->certificate_ids)->where('user_id',auth()->id())->get()->toArray()
        ]);
    }
}
