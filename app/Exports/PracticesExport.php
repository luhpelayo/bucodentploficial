<?php

namespace App\Exports;

use App\Models\Practice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class PracticesExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $practicesData = DB::table('practices')
        ->join('students', 'practices.student_id', '=', 'students.id')
        ->join('matters', 'practices.matter_id', '=', 'matters.id')
        ->join('companies', 'practices.company_id', '=', 'companies.id')
        ->select('practices.practice_date','students.student_lastname','students.student_name','students.student_register','matters.matter_name','matters.matter_initial','matters.matter_group','matters.matter_teacher','companies.company_name','companies.company_contact','practices.practice_description')
        ->orderBy('practices.practice_date','Desc')->get();
        return $practicesData; 
    }

    public function headings(): array{
        return['fecha de Práctica','Apellidos','Nombres','Registro','Materia','Sigla','Grupo','Docente Titular','Empresa','Contacto','Observacion de la Práctica'];
    }
}
