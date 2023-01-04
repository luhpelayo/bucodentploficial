<?php

namespace App\Exports;

use App\Models\Odontologo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class OdontologosExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $odontologosData = Odontologo::select('nombre','apellido','ci','fechanacimiento','direccion','telefono','email','especialidad','ruc')->orderBy('nombre','Asc')->get();
        return $odontologosData; 
    }

    public function headings(): array{
        return['Apellidos','Nombres','Ci','fechanacimiento','Direccion','Telefono','Email','especialidad','ruc'];
    }
}
