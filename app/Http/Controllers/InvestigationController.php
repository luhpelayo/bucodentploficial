<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investigation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\InvestigationsExport;
use Maatwebsite\Excel\Facades\Excel;

class InvestigationController extends Controller
{
    public function create(){
        return view ('laboratory.investigation.addinvestigation');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'investigation_code' => 'required|unique:investigations',
            'investigation_subject' => 'required|max:254',
            'investigation_name' => 'required|max:254',
            'investigation_stardate' => 'required|date',
            'investigation_endate' => 'required|date|after:investigation_stardate',
        ]);
        //dd($request->all()); die();
        if (DB::table('investigations')->where('investigation_name', $request->investigation_name)->doesntExist()) {
            $investigation = new Investigation;
            $investigation->investigation_code = $request->investigation_code;
            $investigation->investigation_subject = $request->investigation_subject;
            $investigation->investigation_name = $request->investigation_name;
            $investigation->investigation_stardate = $request->investigation_stardate;
            $investigation->investigation_endate = $request->investigation_endate;
            $investigation->save();

            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('investigation.show');
        }

        alert()->error('El Nombre ya Existe','Intente de Nuevo')->position('top-end')->autoclose(2000);
        return back();
    }

    public function show(){
        $investigations = Investigation::all();
        return view ('laboratory.investigation.viewinvestigation', compact('investigations'));
    }

    public function edit($id){
        $investigation = Investigation::findOrFail($id);
        return view('laboratory.investigation.editinvestigation',compact('investigation'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'investigation_code' => 'required',
            'investigation_subject' => 'required|max:254',
            'investigation_name' => 'required|max:254',
            'investigation_stardate' => 'required|date',
            'investigation_endate' => 'required|date|after:investigation_stardate',
        ]);
        $investigation = Investigation::findOrFail($id);
        $investigation->investigation_code = $request->investigation_code;
        $investigation->investigation_subject = $request->investigation_subject;
        $investigation->investigation_name = $request->investigation_name;
        $investigation->investigation_stardate = $request->investigation_stardate;
        $investigation->investigation_endate = $request->investigation_endate;
        $investigation->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('investigation.show');
    }

    public function destroy($id){
        $investigation = Investigation::findOrFail($id);
        $investigation->delete();
        alert()->success('Investigación Eliminada','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $investigations = Investigation::orderBy('investigation_code','Asc')->get();
        $fecha = Carbon::now();
        $cantidad = Investigation::count();   
        $pdf = PDF::loadView('laboratory.investigation.staticpdf', compact('investigations','fecha','cantidad'));
        return $pdf->download('investigations.pdf');
    }

    public function allexcel(){
        return Excel::download(new InvestigationsExport, 'investigations.xlsx');
    }

    public function report()
    {
        return view('report.dynamic.laboratory.investigation.data');
    }

    public function query(Request $request){
        $consults = null;
        $investigation_code = $request->investigation_code;
        $investigation_subject = $request->investigation_subject;
        $date_min = $request->date_min;
        $date_max = $request->date_max;
        $investigation_name = $request->investigation_name;
        //dd($request->all()); die();
        $consults = Investigation::select('*')->where(function ($query) use ($request){
            if ($request->investigation_code != null) {
                $query->where('investigation_code','LIKE','%'.$request->investigation_code.'%');
            }
            if ($request->investigation_subject != null) {
                $query->where('investigation_subject','LIKE','%'.$request->investigation_subject.'%');
            }
            if ($request->date_min != null && $request->date_max != null) {
                $query->whereBetween('investigation_stardate', [$request->date_min, $request->date_max]);
            }
            if ($request->investigation_name != null) {
                $query->where('investigation_name','LIKE','%'.$request->investigation_name.'%');
            }
        })->orderBy('investigation_code', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.laboratory.investigation.pdf', compact('consults','fecha','cantidad','investigation_code','investigation_subject','date_min','date_max','investigation_name'));
        return $pdf->stream();

    }
}
