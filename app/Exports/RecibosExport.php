<?php

namespace App\Exports;

use App\Models\Recibo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class RecetasExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $recibosData = DB::table('recibos')
        ->join('consultas', 'recibos.consultaid', '=', 'consultas.id')
        ->join('pacientes', 'consultas.pacienteid', '=', 'pacientes.id')
        ->select('recibos.ajc','recibos.credito','recibos.diente','recibos.fecha','recibos.saldo','tiempo','tratamiento','recibos.consultaid','consultas.pacienteid','pacientes.nombre','pacientes.apellido')
        ->orderBy('Ajc','Asc')->get();
        return $recibosData; 
    }

    public function headings(): array{
        return['Ajc','Credito','Diente','Fecha','Saldo','Tiempo','Tratamiento','Paciente'];
    }
}
