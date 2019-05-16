<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PermissionDataExport implements WithMultipleSheets
{
    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        $sheets[] = new PermissionsExport;
        $sheets[] = new PermissionGroupExport;

        return $sheets;
    }
}
