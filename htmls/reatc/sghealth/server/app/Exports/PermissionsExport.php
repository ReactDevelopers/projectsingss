<?php

namespace App\Exports;

use App\Models\Permission;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class PermissionsExport implements FromCollection, WithMapping, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Permission::with('permissionGroup', 'permissionFields')->get();
    }

    public function map($permission): array
    {
        $permissionFields = $permission->permissionFields->map(function($pg) {
            return $pg->only(['title', 'client_field', 'table_columns']);
        })->toJson();

        return [
            $permission->name,
            $permission->title,
            $permission->is_public,
            $permission->encrypted ? json_encode($permission->encrypted) : '',
            $permission->permissionGroup ? $permission->permissionGroup->name: '',
            $permission->description,
            $permission->limitations ? json_encode($permission->limitations) : '',
            $permissionFields
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Permissions';
    }
}
