<?php

namespace App\Exports;

use App\Models\National;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class NationalsExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $nationalsData = National::select('national_date','national_organization','national_uagrm','national_company')->orderBy('national_date','Asc')->get();
        return $nationalsData;
    }

    public function headings(): array{
        return['Fecha de Convenio','Nombre de Organizacion','Firma de UAGRM','Firma de Empresa'];
    }
}
