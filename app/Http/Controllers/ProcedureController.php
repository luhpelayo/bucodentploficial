<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Procedure;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\ProceduresExport;
use Maatwebsite\Excel\Facades\Excel;
class ProcedureController extends Controller
{
    public function create(){
        $areas = Area::get();
        return view ('docus.procedure.addprocedure', compact('areas'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'procedure_code' => 'required|unique:procedures',
            'procedure_name' => 'required|max:254',
            'procedure_date' => 'required',
            'area_id' => 'required',
            'procedure_document' => 'required|mimes:pdf|max:20240',
        ]);
        if ($request->hasFile('procedure_document')) {
            $proceduretomo = $request->file('procedure_document')->store('procedures','documents');
            $request->procedure_document = $proceduretomo;
        }
        //dd($request->all()); die();
        $procedure = new Procedure;
        $procedure->procedure_code = $request->procedure_code;
        $procedure->procedure_name = $request->procedure_name;
        $procedure->procedure_date = $request->procedure_date;
        $procedure->procedure_document = $request->procedure_document;
        $procedure->area_id = $request->area_id;
        $procedure->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('procedure.show');
    }

    public function edit($id){
        $procedure = Procedure::with('area')->findOrFail($id);
        $areas = Area::get();
        //dd($tomo);
        return view('docus.procedure.editprocedure',compact('procedure','areas'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'procedure_code' => 'required',
            'procedure_name' => 'required|max:254',
            'procedure_date' => 'required',
            'area_id' => 'required',
            'procedure_document' => 'mimes:pdf|max:20240',
        ]);
        $procedure = Procedure::findOrFail($id);
        if ($request->hasFile('procedure_document')) {
            if ($procedure->procedure_document != null) {
                Storage::disk('documents')->delete($procedure->procedure_document);
                $procedure->procedure_document = null;
            }
            $proceduretomo = $request->file('procedure_document')->store('procedures','documents');
            $procedure->procedure_document = $proceduretomo;
        }
        $procedure->procedure_code = $request->procedure_code;
        $procedure->procedure_name = $request->procedure_name;
        $procedure->procedure_date = $request->procedure_date;
        $procedure->area_id = $request->area_id;
        $procedure->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('procedure.show');

    }

    public function show(){
        $procedures = Procedure::with('area')->get();
        //dd($tomos); die();
        return view ('docus.procedure.viewprocedure', compact('procedures'));
    }

    public function destroy($id){
        $procedure = Procedure::findOrFail($id);
        Storage::disk('documents')->delete($procedure->procedure_document);
        $procedure->delete();
        alert()->success('Procedimiento Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $procedures = Procedure::with('area')->orderBy('procedure_code','Asc')->get();
        $fecha = Carbon::now();
        $cantidad = Procedure::count();   
        $pdf = PDF::loadView('docus.procedure.staticpdf', compact('procedures','fecha','cantidad'));
        return $pdf->download('procedimientos.pdf');
    }

    public function allexcel(){
        return Excel::download(new ProceduresExport, 'procedimientos.xlsx');
    }

    public function report(){
        $areas = Area::get();
        return view('report.dynamic.documents.procedure.data', compact('areas'));
    }

    public function query(Request $request){
        $consults = null;
        $procedure_code = $request->procedure_code;
        $area_id = $request->area_id;
        $date_min = $request->date_min;
        $date_max = $request->date_max;
        $procedure_name = $request->procedure_name;
        //dd($request->all()); die();
        $consults = Procedure::select('*')->where(function ($query) use ($request){
            if ($request->procedure_code != null) {
                $query->where('procedure_code','LIKE','%'.$request->procedure_code.'%');
            }
            if ($request->area_id != null) {
                $query->where('area_id','LIKE','%'.$request->area_id.'%');
            }
            if ($request->date_min != null && $request->date_max != null) {
                $query->whereBetween('procedure_date', [$request->date_min, $request->date_max]);
            }
            if ($request->procedure_name != null) {
                $query->where('procedure_name','LIKE','%'.$request->procedure_name.'%');
            }
        })->orderBy('procedure_code', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.documents.procedure.pdf', compact('consults','fecha','cantidad','procedure_code','area_id','date_min','date_max','procedure_name'));
        return $pdf->stream();

    }
}
