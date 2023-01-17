<?php

namespace App\Exports;

use App\Models\Receta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class RecetasExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $recetasData = DB::table('recetas')
        ->join('consultas', 'recetas.idconsulta', '=', 'consultas.id')
        ->join('pacientes', 'consultas.pacienteid', '=', 'pacientes.id')
        ->select('recetas.descripcion','recetas.idconsulta','consultas.pacienteid','pacientes.nombre','pacientes.apellido')
        ->orderBy('descripcion','Asc')->get();
        return $recetasData; 
    }

    public function headings(): array{
        return['Descripcion','Paciente'];
    }
}
