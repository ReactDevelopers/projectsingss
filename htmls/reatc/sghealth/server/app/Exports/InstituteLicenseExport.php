<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\InstituteLicense;

class InstituteLicenseExport implements FromCollection, WithHeadings, WithMapping
{

    protected $institueId = null;

    public function __construct(int $institue_id)
    {
        $this->institueId = $institue_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return InstituteLicense::where('institute_id', $this->institueId)
            ->with('institute', 'branch', 'service', 'license')
            ->get();
    }
    public function headings(): array
    {
        return  ['Institute', 'License', 'branch', 'Modality', 'Expiry Date'];
    }

    /**
    * @var Invoice $employee
    */
    public function map($license): array
    {
        return [

            $license->institute->name,
            $license->license->name,
            $license->branch->name,
            $license->service ? $license->service->name : null,
            $license->expiry_date
        ];
    }
}
