<?php

namespace App\Imports;

use App\Models\Permission;
use App\Models\PermissionGroup;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;

class PermissionsImport implements OnEachRow
{

    public function onRow(Row $row)
    {
        $row      = $row->toArray();
        $permission_group = $row[4] ? PermissionGroup::where('name', $row[4])->first() : null;

        $permission =  Permission::updateOrCreate([
            'name' => $row[0],
        ],[
            //

            'title' => $row[1] ? $row[1]: '',
            'is_public' =>  $row[2],
            'encrypted' => $row[3] ? json_decode($row[3]) : null,
            'permission_group_id' => $permission_group ? $permission_group->id : null,
            'description' => $row[5] ? $row[5] : '',
            'limitations' =>  $row[6] ? json_decode($row[6], true) : null
        ]);

        $permissionFields = $row[7] ? json_decode($row[7], true) : [];

        if(count($permissionFields)) {

            foreach($permissionFields as $permissionField ) {

                $permission->permissionFields()->updateOrCreate([
                    'permission_id' => $permission->id,
                    'client_field' => $permissionField['client_field']
                ], $permissionField);
            }

        }
    }
}
