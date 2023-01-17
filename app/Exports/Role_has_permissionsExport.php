<?php

namespace App\Exports;

use App\Models\Role_has_permission;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class Role_has_permissionsExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $role_has_permissionsData = Role_has_permission_has_permission::select()->orderBy('id','Asc')->get();
        return $role_has_permissionsData; 
    }

    public function headings(): array{
        return[];
    }
}

