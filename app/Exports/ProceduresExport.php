<?php

namespace App\Exports;

use App\Models\Procedure;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class ProceduresExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $proceduresData = DB::table('procedures')
        ->join('areas', 'procedures.area_id', '=', 'areas.id')
        ->select('procedures.procedure_code' ,'procedures.procedure_name','procedures.procedure_date','areas.area_name')
        ->orderBy('procedures.procedure_code','Asc')->get();
        return $proceduresData; 
    }

    public function headings(): array{
        return['Código','Nombre','Fecha','Área'];
    }
}
