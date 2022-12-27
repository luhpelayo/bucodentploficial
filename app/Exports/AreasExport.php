<?php

namespace App\Exports;

use App\Models\Area;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class AreasExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $areasData = Area::select('area_name','area_description')->orderBy('id','Desc')->get();
        return $areasData;
    }

    public function headings(): array{
        return['Nombre','Descripción'];
    }
}
