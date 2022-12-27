<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Tomo;
use App\Models\Acta;
use App\Models\Modality;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\ActasExport;
use Maatwebsite\Excel\Facades\Excel;
class ActaController extends Controller
{
    public function create(){
        $students = Student::with('tomo')->get();
        return view ('graduated.actadefense.addactadefense',compact('students'));
    }

    //recupera el codigo del tomo en base al id del estudiante
    public function auxiliar(Request $request){
        try {
            $tomo_code = Tomo::select('tomo_code')->where('student_id', $request->student_id2)->first();
            $code = $tomo_code->tomo_code; 
            return response()->json($code);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request){
        $validated = $request->validate([
            'student_id2' => 'required',
            'tomo_code2' => 'required',
            'acta_code' => 'required|unique:actas|min:4|max:4',
            'acta_hour' => 'required',
            'acta_date' => 'required',
            'acta_court' => 'required',
            'acta_note' => 'required|min:2|max:3',
            'acta_image' => 'required|image',
        ]);
        //dd($request->all()); die();
        $tomo_id = Tomo::select('id')->where('tomo_code',$request->tomo_code2)->first();
        if (DB::table('actas')->where('tomo_id', $tomo_id->id)->doesntExist()) {
            if ($request->hasFile('acta_image')) {
                $acta_image = $request->file('acta_image')->store('actas','images');
                $request->acta_image = $acta_image;
            }
            $acta = new Acta;
            $acta->acta_code = $request->acta_code;
            $acta->acta_hour = $request->acta_hour;
            $acta->acta_date = $request->acta_date;
            $acta->acta_court = $request->acta_court;
            $acta->acta_note = $request->acta_note;
            $acta->acta_image = $request->acta_image;
            $acta->tomo_id = $tomo_id->id;
            $acta->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('actadef.show');
        }
        alert()->error('El estudiante ya tiene un Acta','Intente de Nuevo')->position('top-end')->autoclose(2000);
        return back();
    }

    public function show(){
        $actas = Acta::with('tomo')->get();
        //dd($tomos); die();
        return view ('graduated.actadefense.viewactadefense', compact('actas'));
    }

    public function edit($id){
        //$tomo = Tomo::findOrFail($id);
        $acta = Acta::with('tomo')->findOrFail($id);
        $students = Student::get();
        //dd($tomo);
        return view('graduated.actadefense.editactadefense',compact('acta','students'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'tomo_code' => 'required',
            'acta_code' => 'required|min:4|max:4',
            'acta_hour' => 'required',
            'acta_date' => 'required',
            'acta_court' => 'required',
            'acta_note' => 'required|min:2|max:3',
            'acta_image' => 'image',
        ]);
        $acta = Acta::findOrFail($id);
        //dd($acta);
        if ($request->hasFile('acta_image')) {
            Storage::disk('images')->delete($acta->acta_image);
            $acta->acta_image = null;
            $acta_image = $request->file('acta_image')->store('actas','images');
            $acta->acta_image = $acta_image;
        }

        $acta->acta_code = $request->acta_code;
        $acta->acta_hour = $request->acta_hour;
        $acta->acta_date = $request->acta_date;
        $acta->acta_court = $request->acta_court;
        $acta->acta_note = $request->acta_note;
        $acta->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('actadef.show');

    }

    public function destroy($id){
        $acta = Acta::findOrFail($id);
        Storage::disk('images')->delete($acta->acta_image);
        $acta->delete();
        alert()->success('Acta Eliminada','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $actas = Acta::with('tomo')->orderBy('acta_code')->get();
        $fecha = Carbon::now();
        $cantidad = Acta::count();   
        $pdf = PDF::loadView('graduated.actadefense.staticpdf', compact('actas','fecha','cantidad'));
        return $pdf->setPaper('a4', 'landscape')->download('actas.pdf');
    }

    public function allexcel(){
        return Excel::download(new ActasExport, 'actas.xlsx');
    }

    public function report()
    {
        $modalities = Modality::get();
        return view('report.dynamic.graduated.actadefense.data', compact('modalities'));
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

        $consults = Acta::select('*')->where(function ($query) use ($request){
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
        })->whereHas('tomo', function($query) use ($request) {
            if ($request->modality_id != null) {
                $query->where('modality_id', '=', $request->modality_id);   
            }
        })->orderBy('acta_code', 'ASC')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.graduated.actadefense.pdf', compact('consults','fecha','cantidad','acta_code','note_min','note_max','date_min','date_max','acta_court','modality_id'));
        return $pdf->setPaper('a4', 'landscape')->stream();

    }

}
