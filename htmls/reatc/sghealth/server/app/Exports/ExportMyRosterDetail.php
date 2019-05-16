<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\WorkSchedule;

class ExportMyRosterDetail implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $institueId = null;
    protected $month = null;

    public function __construct( $month)
    {

        $this->month = $month;
    }

    public function collection()
    {
        return WorkSchedule::where('user_id', \Auth::id())
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
