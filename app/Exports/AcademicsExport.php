<?php

namespace App\Exports;

use App\Models\Academic;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class AcademicsExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $academicsData = DB::table('academics')
        ->join('students', 'academics.student_id', '=', 'students.id')
        ->select('students.student_lastname','students.student_name','academics.academic_name','academics.academic_type','academics.academic_status','academics.academic_institute')
        ->orderBy('students.student_lastname','Asc')->get();
        return $academicsData;
    }

    public function headings(): array{
        return['Apellidos','Nombres','Nombre Especialidad','Tipo de Especialidad','Estado','Nombre de Institución'];
    }
}
