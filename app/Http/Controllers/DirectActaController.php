<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Modality;
use App\Models\DActa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\ActasDirectasExport;
use Maatwebsite\Excel\Facades\Excel;
class DirectActaController extends Controller
{
    public function create(){
        $students = Student::get();
        $modalities = Modality::get();
        return view ('graduated.actadirect.addactadirect',compact('students','modalities'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'acta_code' => 'required|unique:d_actas|min:4|max:4',
            'acta_hour' => 'required',
            'acta_date' => 'required',
            'acta_court' => 'required',
            'acta_note' => 'required|min:2|max:3',
            'acta_image' => 'required|image',
            'modality_id' => 'required',
            'student_id' => 'required',
        ]);
        $tomo = DB::table('tomos')->where('student_id', $request->student_id)->first();
        //dd($student_id);
        if (DB::table('d_actas')->where('student_id', $request->student_id)->doesntExist() && $tomo==null) {
            if ($request->hasFile('acta_image')) {
                $acta_image = $request->file('acta_image')->store('actasDirectas','images');
                $request->acta_image = $acta_image;
            }
            $acta = new DActa;
            $acta->acta_code = $request->acta_code;
            $acta->acta_hour = $request->acta_hour;
            $acta->acta_date = $request->acta_date;
            $acta->acta_court = $request->acta_court;
            $acta->acta_note = $request->acta_note;
            $acta->acta_image = $request->acta_image;
            $acta->modality_id = $request->modality_id;
            $acta->student_id = $request->student_id;
            $acta->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('actadir.show');
        }
        alert()->error('El estudiante ya tiene un Acta','Intente de Nuevo')->position('top-end')->autoclose(2000);
        return back();
    }

    public function show(){
        $actas = DActa::with('student','modality')->get();
        return view ('graduated.actadirect.viewactadirect', compact('actas'));
    }

    public function edit($id){
        $acta = DActa::with('student','modality')->findOrFail($id);
        $modalities = Modality::get();
        return view('graduated.actadirect.editactadirect',compact('acta','modalities'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'acta_code' => 'required|min:4|max:4',
            'acta_hour' => 'required',
            'acta_date' => 'required',
            'acta_court' => 'required',
            'acta_note' => 'required|min:2|max:3',
            'acta_image' => 'image',
            'modality_id' => 'required',
        ]);
        $acta = DActa::findOrFail($id);
        //dd($request->all());
        if ($request->hasFile('acta_image')) {
            Storage::disk('images')->delete($acta->acta_image);
            $acta->acta_image = null;
            $acta_image = $request->file('acta_image')->store('actasDirectas','images');
            $acta->acta_image = $acta_image;
        }
        $acta->acta_code = $request->acta_code;
        $acta->acta_hour = $request->acta_hour;
        $acta->acta_date = $request->acta_date;
        $acta->acta_court = $request->acta_court;
        $acta->acta_note = $request->acta_note;
        $acta->modality_id = $request->modality_id;
        $acta->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('actadir.show');
    }

    public function destroy($id){
        $acta = DActa::findOrFail($id);
        Storage::disk('images')->delete($acta->acta_image);
        $acta->delete();
        alert()->success('Acta Eliminada','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $actas = DActa::with('student','modality')->orderBy('acta_code')->get();
        $fecha = Carbon::now();
        $cantidad = DActa::count();   
        $pdf = PDF::loadView('graduated.actadirect.staticpdf', compact('actas','fecha','cantidad'));
        return $pdf->download('actasDirectas.pdf');
    }

    public function allexcel(){
        return Excel::download(new ActasDirectasExport, 'actasdirectas.xlsx');
    }

    public function report()
    {
        $modalities = Modality::get();
        return view('report.dynamic.graduated.actadirect.data', compact('modalities'));
    }

    public function query(Request $request){
        $consults = null;
        $acta_code = $request->acta_code;
        $date_min = $request->date_min;
        $date_max = $request->date_max;
        $note_min = $request->note_min;
        $note_max = $request->note_max;
        $acta_court = $request->acta_court;
        $modality_id = $request->modality_id;

        $consults = DActa::select('*')->where(function ($query) use ($request){
            if ($request->acta_code != null) {
                $query->where('acta_code','LIKE','%'.$request->acta_code.'%');
            }
            if ($request->date_min != null && $request->date_max != null) {
                $query->whereBetween('acta_date', [$request->date_min, $request->date_max]);
            }
            if ($request->note_min != null && $request->note_max != null) {
                $query->whereBetween('acta_note', [$request->note_min, $request->note_max]);
            }
            if ($request->acta_court != null) {
                $query->where('acta_court','LIKE','%'.$request->acta_court.'%');
            }
            if ($request->modality_id != null) {
                $query->where('modality_id','LIKE','%'.$request->modality_id.'%');
            }
        })->orderBy('acta_code', 'ASC')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.graduated.actadirect.pdf', compact('consults','fecha','cantidad','acta_code','note_min','note_max','date_min','date_max','acta_court','modality_id'));
        return $pdf->setPaper('a4', 'landscape')->stream();

    }

}
