<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PermissionDataImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            1 => new PermissionGroupsImport(),
            0 => new PermissionsImport(),
        ];
    }
}
