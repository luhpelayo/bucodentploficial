<?php

namespace App\Exports;

use App\Models\Culture;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class CulturesExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $culturesData = DB::table('cultures')
        ->join('students', 'cultures.student_id', '=', 'students.id')
        ->select('students.student_lastname','students.student_name','cultures.culture_name','cultures.culture_level')
        ->orderBy('students.student_lastname','Asc')->get();
        return $culturesData;
    }

    public function headings(): array{
        return['Apellidos','Nombres','Nombre de Actividad','Nivel'];
    }
}
