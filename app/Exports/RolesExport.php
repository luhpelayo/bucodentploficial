<?php

namespace App\Exports;

use App\Models\Role;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class RolesExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $rolesData = Role::select('name','guard_name')->orderBy('name','Asc')->get();
        return $rolesData; 
    }

    public function headings(): array{
        return['name','guard_name'];
    }
}
