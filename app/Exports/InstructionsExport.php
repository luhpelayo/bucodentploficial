<?php

namespace App\Exports;

use App\Models\Instruction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class InstructionsExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $instructionsData = DB::table('instructions')
        ->join('areas', 'instructions.area_id', '=', 'areas.id')
        ->select('instructions.instruction_code' ,'instructions.instruction_name','instructions.instruction_date','areas.area_name')
        ->orderBy('instructions.instruction_code','Asc')->get();
        return $instructionsData; 
    }

    public function headings(): array{
        return['Código','Nombre','Fecha','Área'];
    }
}
