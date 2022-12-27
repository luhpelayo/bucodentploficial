<?php

namespace App\Exports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CompaniesExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $companiesData = Company::select('company_name','company_contact','company_number')->orderBy('id','Desc')->get();
        return $companiesData; 
    }

    public function headings(): array{
        return['Nombre de la Empresa','Contacto de la Empresa','Celular'];
    }
}
