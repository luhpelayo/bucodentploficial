<?php

namespace App\Exports;

use App\Models\Odontograma;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class OdontogramasExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $odontogramasData = Odontograma::select('diagnostico','fechainicio','fechafin')->orderBy('nombre','Asc')->get();
        return $odontogramasData; 
    }

    public function headings(): array{
        return['diagnostico','fechainicio','fechafin'];
    }
}
