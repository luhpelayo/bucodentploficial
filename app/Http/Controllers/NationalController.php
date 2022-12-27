<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\National;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\NationalsExport;
use Maatwebsite\Excel\Facades\Excel;
class NationalController extends Controller
{
    public function create(){
        return view ('agreement.national.addnational');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'national_date' => 'required',
            'national_organization' => 'required|unique:nationals|max:254',
            'national_uagrm' => 'required|max:254',
            'national_company' => 'required|max:254',
            'national_document' => 'required|mimes:pdf|max:20240',
        ]);
        if ($request->hasFile('national_document')) {
            $nationaltomo = $request->file('national_document')->store('national','documents');
            $request->national_document = $nationaltomo;
        }
        //dd($request->all()); die();
        $national = new National;
        $national->national_date = $request->national_date;
        $national->national_organization = $request->national_organization;
        $national->national_uagrm = $request->national_uagrm;
        $national->national_company = $request->national_company;
        $national->national_document = $request->national_document;
        $national->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('national.show');
    }

    public function edit($id){
        $national = National::findOrFail($id);
        //dd($tomo);
        return view('agreement.national.editnational',compact('national'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'national_date' => 'required',
            'national_organization' => 'required|max:254',
            'national_uagrm' => 'required|max:254',
            'national_company' => 'required|max:254',
            'national_document' => 'mimes:pdf|max:20240',
        ]);
        $national = National::findOrFail($id);
        if ($request->hasFile('national_document')) {
            if ($national->national_document != null) {
                Storage::disk('documents')->delete($national->national_document);
                $national->national_document = null;
            }
            $nationaltomo = $request->file('national_document')->store('national','documents');
            $national->national_document = $nationaltomo;
        }
        $national->national_date = $request->national_date;
        $national->national_organization = $request->national_organization;
        $national->national_uagrm = $request->national_uagrm;
        $national->national_company = $request->national_company;
        $national->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('national.show');

    }

    public function show(){
        $nationals = National::all();
        //dd($tomos); die();
        return view ('agreement.national.viewnational', compact('nationals'));
    }

    public function destroy($id){
        $national = National::findOrFail($id);
        Storage::disk('documents')->delete($national->national_document);
        $national->delete();
        alert()->success('Convenio Nacional Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $nationals = National::orderBy('national_date','Asc')->get();
        $fecha = Carbon::now();
        $cantidad = National::count();   
        $pdf = PDF::loadView('agreement.national.staticpdf', compact('nationals','fecha','cantidad'));
        return $pdf->download('convenio_nacional.pdf');
    }

    public function allexcel(){
        return Excel::download(new NationalsExport, 'convenios_nacionales.xlsx');
    }

    //REPORTES
    public function report()
    {
        return view('report.dynamic.agreement.national.data');
    }

    public function query(Request $request)
    {
        $consults = null;
        $national_organization = $request->national_organization;
        $national_company = $request->national_company;
        $date_min = $request->date_min;
        $date_max = $request->date_max;
        $national_uagrm = $request->national_uagrm;
        $consults = National::select('*')->where(function ($query) use ($request){
            if ($request->national_organization != null) {
                $query->where('national_organization','LIKE','%'.$request->national_organization.'%');
            }
            if ($request->national_company != null) {
                $query->where('national_company','LIKE','%'.$request->national_company.'%');
            }
            if ($request->date_min != null && $request->date_max != null) {
                $query->whereBetween('national_date', [$request->date_min, $request->date_max]);
            }
            if ($request->national_uagrm != null) {
                $query->where('national_uagrm','LIKE','%'.$request->national_uagrm.'%');
            }
        })->orderBy('national_date', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.agreement.national.pdf', compact('consults','fecha','cantidad','national_organization','national_company','date_min','date_max','national_uagrm'));
        return $pdf->stream();
    }
}
