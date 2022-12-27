<?php

namespace App\Exports;
use App\Models\Assistance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class AssistanceExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $id;
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $assistancesData = DB::table('assistances')
        ->join('students', 'assistances.student_id', '=', 'students.id')
        ->join('trainings', 'assistances.training_id', '=', 'trainings.id')
        ->select(DB::raw('CONCAT_WS(" ", students.student_lastname, students.student_name)'),'students.student_register',DB::raw('CONCAT_WS(" ", students.student_ci, students.student_exp)'),'students.student_number','assistances.assistance_receipt','assistances.assistance_payment','assistances.assistance_amount')
        ->where('trainings.id',$this->id)
        ->orderBy('students.student_lastname','Asc')->get();
        return $assistancesData; 
    }

    public function headings(): array{
        return['Apellidos y Nombres','Registro','Nro C.I','telefono','Nro Recibo','Tipo Deposito','Monto (Bs)'];
    }

}
