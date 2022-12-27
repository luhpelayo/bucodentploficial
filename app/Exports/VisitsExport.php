<?php

namespace App\Exports;

use App\Models\Visit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class VisitsExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $visitsData = DB::table('visits')
        ->join('matters', 'visits.matter_id', '=', 'matters.id')
        ->select('visits.visit_date','matters.matter_name','matters.matter_initial','matters.matter_group','visits.visit_subjectuagrm','visits.visit_company','visits.visit_subjectcompany')
        ->orderBy('visits.visit_date','Asc')->get();
        return $visitsData;
    }

    public function headings(): array{
        return['Fecha Visita','Materia','Sigla','Grupo','Responsable Uagrm','Empresa Visitada','Responsable Empresa'];
    }
}
