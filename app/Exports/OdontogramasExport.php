<?php

namespace App\Exports;

use App\Models\Tratamiento;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class TratamientosExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $tratamientosData = Tratamiento::select('nombre','color','precio')->orderBy('nombre','Asc')->get();
        return $tratamientosData; 
    }

    public function headings(): array{
        return['nombre','color','precio'];
    }
}
