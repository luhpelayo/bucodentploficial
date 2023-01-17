<?php

namespace App\Exports;

use App\Models\Permission;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class PermissionsExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $permissionsData = Permission::select('name','guard_name')->orderBy('name','Asc')->get();
        return $permissionsData; 
    }

    public function headings(): array{
        return['name','guard_name'];
    }
}