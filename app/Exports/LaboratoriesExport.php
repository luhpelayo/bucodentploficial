<?php

namespace App\Exports;

use App\Models\LaboratoryPhoto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class LaboratoriesExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $laboratoriesData = DB::table('laboratory_photos')
        ->join('matters', 'laboratory_photos.matter_id', '=', 'matters.id')
        ->select('laboratory_photos.labphoto_date','laboratory_photos.labphoto_name','laboratory_photos.labphoto_subject','matters.matter_name','matters.matter_initial','matters.matter_group')
        ->orderBy('laboratory_photos.labphoto_date','Desc')->get();
        return $laboratoriesData; 
    }

    public function headings(): array{
        return['Fecha Elaboración','Nombre','Responsable','Materia','Sigla','Grupo'];
    }
}
