<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class InstituteMonthlyRosterExport implements WithMultipleSheets
{
    //use Exportable;

    protected $institueId = null;
    protected $month = null;

    public function __construct(int $institue_id, $month)
    {
        $this->institueId = $institue_id;
        $this->month = $month;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
     /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new InstituteMonthlyScheduleExport($this->institueId, $this->month);
        $sheets[] = new InstituteEmployeeExport($this->institueId);
        $sheets[] = new InstituteLicenseExport($this->institueId);
        return $sheets;
    }
}
