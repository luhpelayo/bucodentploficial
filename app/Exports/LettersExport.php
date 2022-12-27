<?php

namespace App\Exports;

use App\Models\Letter;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class LettersExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $lettersData = DB::table('letters')
        ->join('areas', 'letters.area_id', '=', 'areas.id')
        ->select('letters.letter_code' ,'letters.letter_name','letters.letter_date','areas.area_name')
        ->orderBy('letters.letter_code','Asc')->get();
        return $lettersData; 
    }

    public function headings(): array{
        return['Código','Nombre','Fecha','Área'];
    }
}
