<?php

namespace App\Exports;

use App\Models\Training;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class TrainingsExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $trainingsData = Training::select('training_name','training_stardate','training_endate','training_teacher','training_quantity','training_money')->orderBy('training_stardate','Asc')->get();
        return $trainingsData; 
    }

    public function headings(): array{
        return['Nombre del Curso','Fecha de Inicio','Fecha Final','Docente','Cantidad de Inscritos','Recaudación Total (Bs)'];
    }
}
