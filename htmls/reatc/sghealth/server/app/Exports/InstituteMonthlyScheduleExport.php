<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\WorkSchedule;

class InstituteMonthlyScheduleExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $institueId = null;
    protected $month = null;

    public function __construct($institue_id, $month)
    {
        $this->institueId = is_array($institue_id) ?  $institue_id : [$institue_id];
        $this->month = $month;
    }

    public function collection()
    {
        return WorkSchedule::whereIn('institute_id', $this->institueId)
            ->whereRaw("DATE_FORMAT(work_schedules.date, '%Y-%m') = '{$this->month}'")
            ->with(['user' => function ($q) {
                $q->select('id', 'name');
            }, 'service', 'institute', 'branch'])
            ->get();
    }
    public function headings(): array
    {
        return  ['Employee Name', 'Institue', 'Branch', 'Service', 'Date', 'Start Time', 'End Time'];

    }

    /**
    * @var Invoice $shchedule
    */
    public function map($shchedule): array
    {
        return [
            $shchedule->user->name,
            $shchedule->institute->name,
            $shchedule->branch->name,
            $shchedule->service->name,
            $shchedule->date,
            $shchedule->start_time,
            $shchedule->end_time,
        ];
    }
}
