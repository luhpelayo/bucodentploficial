<?php

namespace App\Exports;

use App\Models\Diente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class DientesExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $dientesData = Diente::select('numerodiente','nombre','estado')->orderBy('numerodiente','Asc')->get();
        return $dientesData; 
    }

    public function headings(): array{
        return['numerodiente','nombre','estado'];
    }
}
