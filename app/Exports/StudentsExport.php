<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class StudentsExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $studentsData = Student::select('student_lastname','student_name','student_register','student_ci','student_exp','student_number')->orderBy('student_lastname','Asc')->get();
        return $studentsData; 
    }

    public function headings(): array{
        return['Apellidos','Nombres','Registro','Nro Ci','Lugar Expedición','Celular'];
    }
}
