<?php

namespace App\Exports;

use App\Models\DActa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ActasDirectasExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $actasData = DB::table('d_actas')
        ->join('students', 'd_actas.student_id', '=', 'students.id')
        ->join('modalities', 'd_actas.modality_id', '=', 'modalities.id')
        ->select('d_actas.acta_code' ,'students.student_lastname','students.student_name','modalities.modality_name','d_actas.acta_court','d_actas.acta_note','d_actas.acta_hour','d_actas.acta_date')
        ->orderBy('d_actas.acta_code','Asc')->get();
        return $actasData; 
    }

    public function headings(): array{
        return['Código Acta','Apellidos','Nombres','Modalidad','tribunal','nota','Hora','fecha'];
    }
}
