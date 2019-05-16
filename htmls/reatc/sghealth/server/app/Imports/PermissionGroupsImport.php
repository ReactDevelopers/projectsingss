<?php

namespace App\Imports;

use Maatwebsite\Excel\Row;
use App\Models\PermissionGroup;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\OnEachRow;

class PermissionGroupsImport implements OnEachRow
{
    public function onRow(Row $row)
    {
        $row      = $row->toArray();
        PermissionGroup::firstOrCreate(['name' => $row[0]], [
            'name' => $row[0],
            'description' => $row[0],
        ]);
    }
}
