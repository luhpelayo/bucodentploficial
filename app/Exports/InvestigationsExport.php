<?php

namespace App\Exports;

use App\Models\Investigation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class InvestigationsExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $investigationsData = Investigation::select('investigation_code','investigation_subject','investigation_name','investigation_stardate','investigation_endate')->orderBy('investigation_code','Asc')->get();
        return $investigationsData; 
    }

    public function headings(): array{
        return['Código','Responsable','Nombre','Fecha Inicio','Fecha Final'];
    }
}
