<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Institute;

class InstituteEmployeeExport implements FromCollection,  WithHeadings, WithMapping
{
    protected $institueId = null;
    protected $institue = null;

    public function __construct(int $institue_id)
    {
        $this->institueId = $institue_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {


        $this->institute = Institute::findOrFail($this->institueId);

        $employees = $this->institute->users()->select(
            'id',
            'name',
            'service_ids',
            'branch_ids',
            'ahpc',
            'ahpc_expiry_date'
        )->with('profileImage','canWorkAt', 'services')->get();

        return $employees;
    }
    public function headings(): array
    {
        return  ['Name', 'Institute', 'Can Work At', 'Modality', 'AHPC', 'AHPC Expiry'];

    }

    /**
    * @var Invoice $employee
    */
    public function map($employee): array
    {
        return [
            $employee->name,
            $this->institute->name,
            $employee->canWorkAt->implode('name', ', '),
            $employee->services->implode('name', ', '),
            $employee->ahpc,
            $employee->ahpc_expiry_date,
        ];
    }
}
