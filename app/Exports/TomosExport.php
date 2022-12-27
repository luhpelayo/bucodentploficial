<?php

namespace App\Exports;

use App\Models\Tomo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class TomosExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $tomosData = DB::table('tomos')
        ->join('students', 'tomos.student_id', '=', 'students.id')
        ->join('modalities', 'tomos.modality_id', '=', 'modalities.id')
        ->join('categories', 'tomos.category_id', '=', 'categories.id')
        ->select('tomos.tomo_code' ,'students.student_lastname','students.student_name','tomos.tomo_title','modalities.modality_name','categories.category_name','tomos.tomo_consultant','tomos.tomo_year')
        ->orderBy('tomos.tomo_code','Asc')->get();
        return $tomosData; 
    }

    public function headings(): array{
        return['Código','Apellidos','Nombres','Título','Modalidad','Categoría','Asesor','Año'];
    }
}
