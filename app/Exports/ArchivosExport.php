<?php

namespace App\Exports;

use App\Models\Archivo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ArchivosExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $archivossData = Archivo::select('descripcion')->orderBy('Descripcion','Asc')->get();
        return $archivosData; 
    }

    public function headings(): array{
        return['Descripcion'];
    }
}
