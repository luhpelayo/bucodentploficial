<?php

namespace App\Exports;

use App\Models\Modality;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ModalitiesExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $modalitiesData = Modality::select('modality_name','modality_description')->orderBy('id','Desc')->get();
        return $modalitiesData;
    }

    public function headings(): array{
        return['Nombre','Descripción'];
    }
}
