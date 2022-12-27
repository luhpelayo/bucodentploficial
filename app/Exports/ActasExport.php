<?php

namespace App\Exports;

use App\Models\Acta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class ActasExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $actasData = DB::table('actas')
        ->join('tomos', 'actas.tomo_id', '=', 'tomos.id')
        ->join('modalities', 'tomos.modality_id', '=', 'modalities.id')
        ->join('categories', 'tomos.category_id', '=', 'categories.id')
        ->join('students', 'tomos.student_id', '=', 'students.id')
        ->select('actas.acta_code' ,'students.student_lastname','students.student_name','tomos.tomo_title','modalities.modality_name','actas.acta_court','actas.acta_note','actas.acta_hour','actas.acta_date')
        ->orderBy('actas.acta_code','Asc')->get();
        return $actasData; 
    }

    public function headings(): array{
        return['Código Acta','Apellidos','Nombres','Título TFG','Modalidad','tribunal de Defensa','nota','Hora','fecha'];
    }

}
