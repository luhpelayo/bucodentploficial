<?php

namespace App\Exports;

use App\Models\International;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class InternationalsExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $internationalsData = International::select('international_date','international_organization','international_uagrm','international_company')->orderBy('international_date','Asc')->get();
        return $internationalsData;
    }

    public function headings(): array{
        return['Fecha de Convenio','Nombre de Organizacion','Firma de UAGRM','Firma de Empresa'];
    }
}
