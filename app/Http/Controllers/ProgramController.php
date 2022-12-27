<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Program;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\ProgramsExport;
use Maatwebsite\Excel\Facades\Excel;
class ProgramController extends Controller
{
    public function create(){
        $areas = Area::get();
        return view ('docus.program.addprogram', compact('areas'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'program_code' => 'required|unique:programs|max:50',
            'program_name' => 'required|max:100',
            'program_acronym' => 'required|max:20',
            'program_level' => 'required',
            'program_credit' => 'required|max:10',
            'program_date' => 'required',
            'program_designed' => 'required|max:100',
            'area_id' => 'required',
            'program_document' => 'required|mimes:pdf|max:20240',
        ]);
        if ($request->hasFile('program_document')) {
            $programtomo = $request->file('program_document')->store('AnalyticProg','documents');
            $request->program_document = $programtomo;
        }
        //dd($request->all()); die();
        $program = new Program;
        $program->program_code = $request->program_code;
        $program->program_name = $request->program_name;
        $program->program_acronym = $request->program_acronym;
        $program->program_level = $request->program_level;
        $program->program_credit = $request->program_credit;
        $program->program_date = $request->program_date;
        $program->program_designed = $request->program_designed;
        $program->program_document = $request->program_document;
        $program->area_id = $request->area_id;
        $program->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('program.show');
    }

    public function edit($id){
        $program = Program::with('area')->findOrFail($id);
        $areas = Area::get();
        //dd($tomo);
        return view('docus.program.editprogram',compact('program','areas'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'program_code' => 'required|max:50',
            'program_name' => 'required|max:100',
            'program_acronym' => 'required|max:20',
            'program_level' => 'required',
            'program_credit' => 'required|max:10',
            'program_date' => 'required',
            'program_designed' => 'required|max:100',
            'area_id' => 'required',
            'program_document' => 'mimes:pdf|max:20240',
        ]);
        $program = Program::findOrFail($id);
        if ($request->hasFile('program_document')) {
            if ($program->program_document != null) {
                Storage::disk('documents')->delete($program->program_document);
                $program->program_document = null;
            }
            $programtomo = $request->file('program_document')->store('AnalyticProg','documents');
            $program->program_document = $programtomo;
        }
        $program->program_code = $request->program_code;
        $program->program_name = $request->program_name;
        $program->program_acronym = $request->program_acronym;
        $program->program_level = $request->program_level;
        $program->program_credit = $request->program_credit;
        $program->program_date = $request->program_date;
        $program->program_designed = $request->program_designed;
        $program->area_id = $request->area_id;
        $program->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('program.show');

    }

    public function show(){
        $programs = Program::with('area')->get();
        //dd($tomos); die();
        return view ('docus.program.viewprogram', compact('programs'));
    }

    public function destroy($id){
        $program = Program::findOrFail($id);
        Storage::disk('documents')->delete($program->program_document);
        $program->delete();
        alert()->success('Programa Analítico Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $programs = Program::with('area')->orderBy('program_level','Asc')->get();
        $fecha = Carbon::now();
        $cantidad = Program::count();   
        $pdf = PDF::loadView('docus.program.staticpdf', compact('programs','fecha','cantidad'));
        return $pdf->setPaper('a4', 'landscape')->download('programas_analiticos.pdf');
    }

    public function allexcel(){
        return Excel::download(new ProgramsExport, 'programas_analiticos.xlsx');
    }

    public function report(){
        $areas = Area::get();
        return view('report.dynamic.documents.programs.data', compact('areas'));
    }

    public function query(Request $request){
        $consults = null;
        $program_code = $request->program_code;
        $area_id = $request->area_id;
        $program_name = $request->program_name;
        $program_acronym = $request->program_acronym;
        $program_credit = $request->program_credit;
        $program_level = $request->program_level;
        $date_min = $request->date_min;
        $date_max = $request->date_max;
        $program_designed = $request->program_designed;
        //dd($request->all()); die();
        $consults = Program::select('*')->where(function ($query) use ($request){
            if ($request->program_code != null) {
                $query->where('program_code','LIKE','%'.$request->program_code.'%');
            }
            if ($request->area_id != null) {
                $query->where('area_id','LIKE','%'.$request->area_id.'%');
            }
            if ($request->program_name != null) {
                $query->where('program_name','LIKE','%'.$request->program_name.'%');
            }
            if ($request->program_acronym != null) {
                $query->where('program_acronym','LIKE','%'.$request->program_acronym.'%');
            }
            if ($request->program_credit != null) {
                $query->where('program_credit','LIKE','%'.$request->program_credit.'%');
            }
            if ($request->program_level != null) {
                $query->where('program_level','LIKE','%'.$request->program_level.'%');
            }
            if ($request->date_min != null && $request->date_max != null) {
                $query->whereBetween('program_date', [$request->date_min, $request->date_max]);
            }
            if ($request->program_designed != null) {
                $query->where('program_designed','LIKE','%'.$request->program_designed.'%');
            }
        })->orderBy('program_level', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.documents.programs.pdf', compact('consults','fecha','cantidad','program_code','area_id','program_name','program_acronym','program_credit','program_level','date_min','date_max','program_designed'));
        return $pdf->setPaper('a4', 'landscape')->stream();

    }

}
