<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use PDF;
use Carbon\Carbon;
use App\Exports\CompaniesExport;
use Maatwebsite\Excel\Facades\Excel;
class CompanyController extends Controller
{
    public function create(){
        return view ('practiceind.company.addCompany');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'company_name' => 'required|unique:companies',
            'company_contact' => 'required',
            'company_number' => 'required|min:8|max:8',
        ]);
        $company = new Company;
        $company->company_name = $request->company_name;
        $company->company_contact = $request->company_contact;
        $company->company_number = $request->company_number;
        $company->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('company.show');
    }

    public function show(){
        $companies = Company::all();
        return view ('practiceind.company.viewCompany', compact('companies'));
    }

    public function edit($id){
        $company = Company::findOrFail($id);
        return view('practiceind.company.editCompany',compact('company'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'company_name' => 'required',
            'company_contact' => 'required',
            'company_number' => 'required|min:8|max:8',
        ]);
        $company = Company::findOrFail($id);
        $company->company_name = $request->company_name;
        $company->company_contact = $request->company_contact;
        $company->company_number = $request->company_number;
        $company->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('company.show');
    }

    public function destroy($id){
        $company = Company::findOrFail($id);
        $company->delete();
        alert()->success('Empresa Eliminada','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $companies = Company::all();
        $fecha = Carbon::now();
        $cantidad = Company::count();   
        $pdf = PDF::loadView('practiceind.company.staticpdf', compact('companies','fecha','cantidad'));
        return $pdf->download('Empresas.pdf');
    }

    public function allexcel(){
        return Excel::download(new CompaniesExport, 'empresas.xlsx');
    }
}
