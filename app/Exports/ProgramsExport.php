<?php

namespace App\Exports;

use App\Models\Program;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class ProgramsExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ProgramsData = DB::table('programs')
        ->join('areas', 'programs.area_id', '=', 'areas.id')
        ->select('programs.program_code' ,'programs.program_name','programs.program_acronym','programs.program_level','programs.program_credit','programs.program_date','programs.program_designed','areas.area_name')
        ->orderBy('programs.program_level','Asc')->get();
        return $ProgramsData; 
    }

    public function headings(): array{
        return['Código','Asignatura','Sigla-Código','Nivel','Créditos','Fecha de Elaboración','Elaborado por','Área'];
    }
}
