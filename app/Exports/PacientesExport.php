<?php

namespace App\Exports;

use App\Models\Paciente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class PacientesExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pacientesData = Paciente::select('nombre','apellido','ci','fechanacimiento','direccion','telefono','email')->orderBy('nombre','Asc')->get();
        return $pacientesData; 
    }

    public function headings(): array{
        return['Apellidos','Nombres','Ci','fechanacimiento','Direccion','Telefono','Email'];
    }
}
