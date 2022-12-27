<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\International;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\InternationalsExport;
use Maatwebsite\Excel\Facades\Excel;
class InternationalController extends Controller
{
    public function create(){
        return view ('agreement.international.addinter');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'international_date' => 'required',
            'international_organization' => 'required|unique:internationals|max:254',
            'international_uagrm' => 'required|max:254',
            'international_company' => 'required|max:254',
            'international_document' => 'required|mimes:pdf|max:20240',
        ]);
        if ($request->hasFile('international_document')) {
            $internationaltomo = $request->file('international_document')->store('international','documents');
            $request->international_document = $internationaltomo;
        }
        //dd($request->all()); die();
        $international = new International;
        $international->international_date = $request->international_date;
        $international->international_organization = $request->international_organization;
        $international->international_uagrm = $request->international_uagrm;
        $international->international_company = $request->international_company;
        $international->international_document = $request->international_document;
        $international->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('inter.show');
    }

    public function edit($id){
        $international = International::findOrFail($id);
        //dd($tomo);
        return view('agreement.international.editinter',compact('international'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'international_date' => 'required',
            'international_organization' => 'required|max:254',
            'international_uagrm' => 'required|max:254',
            'international_company' => 'required|max:254',
            'international_document' => 'mimes:pdf|max:20240',
        ]);
        $international = International::findOrFail($id);
        if ($request->hasFile('international_document')) {
            if ($international->international_document != null) {
                Storage::disk('documents')->delete($international->international_document);
                $international->international_document = null;
            }
            $internationaltomo = $request->file('international_document')->store('international','documents');
            $international->international_document = $internationaltomo;
        }
        $international->international_date = $request->international_date;
        $international->international_organization = $request->international_organization;
        $international->international_uagrm = $request->international_uagrm;
        $international->international_company = $request->international_company;
        $international->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('inter.show');

    }

    public function show(){
        $internationals = International::all();
        //dd($tomos); die();
        return view ('agreement.international.viewinter', compact('internationals'));
    }

    public function destroy($id){
        $international = International::findOrFail($id);
        Storage::disk('documents')->delete($international->international_document);
        $international->delete();
        alert()->success('Convenio Internacional Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $internationals = International::orderBy('international_date','Asc')->get();
        $fecha = Carbon::now();
        $cantidad = International::count();   
        $pdf = PDF::loadView('agreement.international.staticpdf', compact('internationals','fecha','cantidad'));
        return $pdf->download('convenio_internacional.pdf');
    }

    public function allexcel(){
        return Excel::download(new InternationalsExport, 'convenios_internacionales.xlsx');
    }

    //REPORTES
    public function report()
    {
        return view('report.dynamic.agreement.international.data');
    }

    public function query(Request $request)
    {
        $consults = null;
        $international_organization = $request->international_organization;
        $international_company = $request->international_company;
        $date_min = $request->date_min;
        $date_max = $request->date_max;
        $international_uagrm = $request->international_uagrm;
        $consults = International::select('*')->where(function ($query) use ($request){
            if ($request->international_organization != null) {
                $query->where('international_organization','LIKE','%'.$request->international_organization.'%');
            }
            if ($request->international_company != null) {
                $query->where('international_company','LIKE','%'.$request->international_company.'%');
            }
            if ($request->date_min != null && $request->date_max != null) {
                $query->whereBetween('international_date', [$request->date_min, $request->date_max]);
            }
            if ($request->international_uagrm != null) {
                $query->where('international_uagrm','LIKE','%'.$request->international_uagrm.'%');
            }
        })->orderBy('international_date', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.agreement.international.pdf', compact('consults','fecha','cantidad','international_organization','international_company','date_min','date_max','international_uagrm'));
        return $pdf->stream();
    }
}
