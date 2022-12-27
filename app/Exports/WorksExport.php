<?php

namespace App\Exports;

use App\Models\Work;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class WorksExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $worksData = DB::table('works')
        ->join('students', 'works.student_id', '=', 'students.id')
        ->select('students.student_lastname','students.student_name','works.work_company','works.work_role','works.work_status','works.work_stardate','works.work_endate','works.work_activities','works.work_references')
        ->orderBy('students.student_lastname','Asc')->get();
        return $worksData;
    }

    public function headings(): array{
        return['Apellidos','Nombres','Empresa','Cargo','Estado','Fecha de Ingreso','Fecha Despido','Funciones Realizadas','Referencia'];
    }
}
