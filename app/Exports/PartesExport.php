<?php

namespace App\Exports;

use App\Models\Parte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class PartesExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $partesData = Parte::select('numeroparte','nombre','estado')->orderBy('numeroparte','Asc')->get();
        return $partesData; 
    }

    public function headings(): array{
        return['numeroparte','nombre','estado'];
    }
}
