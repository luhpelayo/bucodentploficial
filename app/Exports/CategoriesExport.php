<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CategoriesExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $categoriesData = Category::select('category_name','category_description')->orderBy('id','Desc')->get();
        return $categoriesData;
    }

    public function headings(): array{
        return['Nombre','Descripción'];
    }
}
