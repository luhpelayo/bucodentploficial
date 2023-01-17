<?php

namespace App\Exports;

use App\Models\Consulta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ConsultasExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $consultasData = Consulta::select('fechahora')->orderBy('fechahora','Asc')->get();
        return $consultasData; 
    }

    public function headings(): array{
        return['fechahora'];
    }
}