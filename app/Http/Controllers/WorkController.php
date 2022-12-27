<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Work;
use App\Models\Student;
use PDF;
use Carbon\Carbon;
use App\Exports\WorksExport;
use Maatwebsite\Excel\Facades\Excel;
class WorkController extends Controller
{
    public function create(){
        $students = Student::get();
        return view ('tracking.work.addwork', compact('students'));
    }

    //Manda el Valor del Select work_status del addwork
    public function auxiliar(Request $request){
        try {
            return response()->json($request->work_status);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request){
        $validated = $request->validate([
            'work_company' => 'required|max:100',
            'work_role' => 'required|max:30',
            'work_stardate' => 'required|date',
            'work_endate' => 'date|after:work_stardate',
            'work_activities' => 'required|max:254',
            'work_status' => 'required',
            'work_references' => 'required|max:100',
            'student_id3' => 'required',
        ]);
        //dd($request->all()); die();
        $work = new Work;
        $work->work_company = $request->work_company;
        $work->work_role = $request->work_role;
        $work->work_stardate = $request->work_stardate;
        $work->work_endate = $request->work_endate;
        $work->work_activities = $request->work_activities;
        $work->work_status = $request->work_status;
        $work->work_references = $request->work_references;
        $work->student_id = $request->student_id3;
        $work->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('work.show');
    }

    public function edit($id){
        $work = Work::with('student')->findOrFail($id);
        return view('tracking.work.editwork',compact('work'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'work_company' => 'required|max:100',
            'work_role' => 'required|max:30',
            'work_stardate' => 'required|date',
            'work_endate' => 'nullable|date|after:work_stardate',
            'work_activities' => 'required|max:254',
            'work_status' => 'required',
            'work_references' => 'required|max:100',
        ]);
        //dd($request->all()); die();
        $work = Work::findOrFail($id);
        $work->work_company = $request->work_company;
        $work->work_role = $request->work_role;
        $work->work_stardate = $request->work_stardate;
        $work->work_endate = $request->work_endate;
        $work->work_activities = $request->work_activities;
        $work->work_status = $request->work_status;
        $work->work_references = $request->work_references;
        $work->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('work.show');
    }

    public function show(){
        $works = Work::with('student')->get();
        return view ('tracking.work.viewwork', compact('works'));
    }

    public function destroy($id){
        $work = Work::findOrFail($id);
        $work->delete();
        alert()->success('Seguimiento Laboral Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $works = Work::with('student')->orderBy('work_status','Asc')->get();
        $fecha = Carbon::now();
        $cantidad = Work::count();   
        $pdf = PDF::loadView('tracking.work.staticpdf', compact('works','fecha','cantidad'));
        return $pdf->setPaper('a4', 'landscape')->download('works_tracking.pdf');
    }

    public function allexcel(){
        return Excel::download(new WorksExport, 'works_tracking.xlsx');
    }

    public function report()
    {
        $students = Student::get();
        return view('report.dynamic.tracking.work.data', compact('students'));
    }

    public function query(Request $request){
        $consults = null;
        $student_id = $request->student_id;
        $work_company = $request->work_company;
        $work_status = $request->work_status;
        $work_role = $request->work_role;
        $student_name = $request->student_name;
        $student_lastname = $request->student_lastname;
        $work_activities = $request->work_activities;
        $work_references = $request->work_references;
        //dd($request->all()); die();
        $consults = Work::select('*')->where(function ($query) use ($request){
            if ($request->student_id != null) {
                $query->where('student_id','LIKE','%'.$request->student_id.'%');
            }
            if ($request->work_company != null) {
                $query->where('work_company','LIKE','%'.$request->work_company.'%');
            }
            if ($request->work_status != null) {
                $query->where('work_status','LIKE','%'.$request->work_status.'%');
            }
            if ($request->work_role != null) {
                $query->where('work_role','LIKE','%'.$request->work_role.'%');
            }
            if ($request->work_activities != null) {
                $query->where('work_activities','LIKE','%'.$request->work_activities.'%');
            }
            if ($request->work_references != null) {
                $query->where('work_references','LIKE','%'.$request->work_references.'%');
            }
        })->whereHas('student', function($query) use ($request) {
            if ($request->student_name != null) {
                $query->where('student_name','LIKE','%'.$request->student_name.'%');  
            }else {
                $query->where('student_lastname','LIKE','%'.$request->student_lastname.'%');
            }
        })->orderBy('work_status', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.tracking.work.pdf', compact('consults','fecha','cantidad','student_id','work_company','work_status','work_role','student_name','student_lastname','work_activities','work_references'));
        return $pdf->setPaper('a4', 'landscape')->stream();

    }


}
