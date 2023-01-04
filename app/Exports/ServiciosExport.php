<?php

namespace App\Exports;

use App\Models\Servicio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ServiciosExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $serviciosData = Servicio::select('nombre','descripcion','precio')->orderBy('nombre','Asc')->get();
        return $serviciosData; 
    }

    public function headings(): array{
        return['Nombre','Descripcion','precio'];
    }
}
