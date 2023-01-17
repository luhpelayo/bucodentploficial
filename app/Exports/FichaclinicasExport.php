<?php

namespace App\Exports;

use App\Models\Fichaclinica;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class FichaclinicasExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $fichaclinicasData = DB::table('fichaclinicas')
        ->join('archivos', 'fichaclinicas.idarchivo', '=', 'archivos.id')
        ->join('consultas', 'fichaclinicas.consultaid', '=', 'consultas.id')
        ->select('fichaclinicas.alergia','fichaclinicas.radiografia','archivos.descripcion','consultas.fechahora')
        ->orderBy('fichaclinicas.alergia','Asc')->get();
        return $fichaclinicasData; 
    }

    public function headings(): array{
        return['Alergia','Radiografia','Descripcion','Consulta'];
    }
}
