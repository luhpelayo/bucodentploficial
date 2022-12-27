<?php

namespace App\Exports;

use App\Models\Guide;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class GuidesExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $guidesData = DB::table('guides')
        ->join('matters', 'guides.matter_id', '=', 'matters.id')
        ->select('guides.guide_name','matters.matter_name','matters.matter_initial','matters.matter_group','matters.matter_teacher')
        ->orderBy('guides.guide_name','Asc')->get();
        return $guidesData; 
    }

    public function headings(): array{
        return['Nombre Práctica','Materia','Sigla','Grupo','Docente Titular'];
    }
}
