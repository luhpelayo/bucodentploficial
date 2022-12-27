<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matter;
use App\Models\Guide;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\GuidesExport;
use Maatwebsite\Excel\Facades\Excel;
class GuideController extends Controller
{
    public function create(){
        $matters = Matter::get();
        return view ('laboratory.guides.addGuide',compact('matters'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'matter_id2' => 'required',
            'guide_name' => 'required|unique:guides|max:254',
            'guide_document' => 'required|mimes:pdf|max:20240',
        ]);
        //dd($request->all()); die();
            $docuguide = $request->file('guide_document')->store('guides','documents');
            $request->guide_document = $docuguide;

            $guide = new Guide;
            $guide->guide_name = $request->guide_name;
            $guide->guide_document = $request->guide_document;
            $guide->matter_id = $request->matter_id2;
            $guide->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('guide.show');
    }

    public function show(){
        $guides = Guide::with('matter')->get();
        //dd($tomos); die();
        return view ('laboratory.guides.viewGuide',compact('guides'));
    }

    public function edit($id){
        $guide = Guide::with('matter')->findOrFail($id);
        $matters = Matter::get();
        //dd($tomo);
        return view('laboratory.guides.editGuide',compact('guide','matters'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'matter_id2' => 'required',
            'guide_name' => 'required|max:254',
            'guide_document' => 'mimes:pdf|max:20240',
        ]);
        $guide = Guide::findOrFail($id);
        if ($request->hasFile('guide_document')) {
            Storage::disk('documents')->delete($guide->guide_document);
            $guide->guide_document = null;
            $docuguide = $request->file('guide_document')->store('guides','documents');
            $guide->guide_document = $docuguide;
        }

        $guide->guide_name = $request->guide_name;
        $guide->matter_id = $request->matter_id2;
        $guide->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('guide.show');
    }

    public function destroy($id){
        $guide = Guide::findOrFail($id);
        Storage::disk('documents')->delete($guide->guide_document);
        $guide->delete();
        alert()->success('Guía Eliminada','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $guides = Guide::with('matter')->orderBy('guide_name')->get();
        $fecha = Carbon::now();
        $cantidad = Guide::count();   
        $pdf = PDF::loadView('laboratory.guides.staticpdf', compact('guides','fecha','cantidad'));
        return $pdf->download('guias.pdf');
    }

    public function allexcel(){
        return Excel::download(new GuidesExport, 'Guias.xlsx');
    }

    public function report()
    {
        $matters = Matter::get();
        return view('report.dynamic.laboratory.guide.data', compact('matters'));
    }

    public function query(Request $request){
        $consults = null;
        $guide_name = $request->guide_name;
        $matter_id = $request->matter_id;
        $date_min = $request->date_min;
        $date_max = $request->date_max;
        $matter_teacher = $request->matter_teacher;
        //dd($request->all()); die();
        $consults = Guide::select('*')->where(function ($query) use ($request){
            if ($request->guide_name != null) {
                $query->where('guide_name','LIKE','%'.$request->guide_name.'%');
            }
            if ($request->matter_id != null) {
                $query->where('matter_id','LIKE','%'.$request->matter_id.'%');
            }
            if ($request->date_min != null && $request->date_max != null) {
                $query->whereBetween('created_at', [$request->date_min, $request->date_max]);
            }
        })->whereHas('matter', function($query) use ($request) {
            if ($request->matter_teacher != null) {
                $query->where('matter_teacher','LIKE','%'.$request->matter_teacher.'%');  
            }
        })->orderBy('guide_name', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.laboratory.guide.pdf', compact('consults','fecha','cantidad','guide_name','matter_id','date_min','date_max','matter_teacher'));
        return $pdf->stream();

    }

}
