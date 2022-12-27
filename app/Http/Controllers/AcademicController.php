<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Academic;
use App\Models\Student;
use PDF;
use Carbon\Carbon;
use App\Exports\AcademicsExport;
use Maatwebsite\Excel\Facades\Excel;
class AcademicController extends Controller
{
    public function create(){
        $students = Student::get();
        return view ('tracking.academic.addacademic', compact('students'));
    }

    //recupera datos del estudiante en base al ID
    public function auxiliar(Request $request){
        try {
            $student = Student::findOrFail($request->student_id3);
            return response()->json($student);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request){
        $validated = $request->validate([
            'academic_name' => 'required|max:254',
            'academic_type' => 'required',
            'academic_status' => 'required',
            'academic_institute' => 'required|max:100',
            'student_id3' => 'required',
        ]);
        //dd($request->all()); die();
        $academic = new Academic;
        $academic->academic_name = $request->academic_name;
        $academic->academic_type = $request->academic_type;
        $academic->academic_status = $request->academic_status;
        $academic->academic_institute = $request->academic_institute;
        $academic->student_id = $request->student_id3;
        $academic->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('acad.show');
    }

    public function edit($id){
        $academic = Academic::with('student')->findOrFail($id);
        return view('tracking.academic.editacademic',compact('academic'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'academic_name' => 'required|max:254',
            'academic_type' => 'required',
            'academic_status' => 'required',
            'academic_institute' => 'required|max:100',
        ]);
        //dd($request->all()); die();
        $academic = Academic::findOrFail($id);
        $academic->academic_name = $request->academic_name;
        $academic->academic_type = $request->academic_type;
        $academic->academic_status = $request->academic_status;
        $academic->academic_institute = $request->academic_institute;
        $academic->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('acad.show');
    }

    public function show(){
        $academics = Academic::with('student')->get();
        //dd($tomos); die();
        return view ('tracking.academic.viewacademic', compact('academics'));
    }

    public function destroy($id){
        $academic = Academic::findOrFail($id);
        $academic->delete();
        alert()->success('Seguimiento Academico Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $academics = Academic::with('student')->orderBy('academic_status')->get();
        $fecha = Carbon::now();
        $cantidad = Academic::count();   
        $pdf = PDF::loadView('tracking.academic.staticpdf', compact('academics','fecha','cantidad'));
        return $pdf->download('academics_tracking.pdf');
    }

    public function allexcel(){
        return Excel::download(new AcademicsExport, 'academics_tracking.xlsx');
    }

    public function report()
    {
        $students = Student::get();
        return view('report.dynamic.tracking.academic.data', compact('students'));
    }

    public function query(Request $request){
        $consults = null;
        $student_id = $request->student_id;
        $academic_name = $request->academic_name;
        $academic_type = $request->academic_type;
        $academic_status = $request->academic_status;
        $student_name = $request->student_name;
        $student_lastname = $request->student_lastname;
        $academic_institute = $request->academic_institute;
        //dd($request->all()); die();
        $consults = Academic::select('*')->where(function ($query) use ($request){
            if ($request->student_id != null) {
                $query->where('student_id','LIKE','%'.$request->student_id.'%');
            }
            if ($request->academic_name != null) {
                $query->where('academic_name','LIKE','%'.$request->academic_name.'%');
            }
            if ($request->academic_type != null) {
                $query->where('academic_type','LIKE','%'.$request->academic_type.'%');
            }
            if ($request->academic_status != null) {
                $query->where('academic_status','LIKE','%'.$request->academic_status.'%');
            }
            if ($request->academic_institute != null) {
                $query->where('academic_institute','LIKE','%'.$request->academic_institute.'%');
            }
        })->whereHas('student', function($query) use ($request) {
            if ($request->student_name != null) {
                $query->where('student_name','LIKE','%'.$request->student_name.'%');  
            }else {
                $query->where('student_lastname','LIKE','%'.$request->student_lastname.'%');
            }
        })->orderBy('academic_status', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.tracking.academic.pdf', compact('consults','fecha','cantidad','student_id','academic_name','academic_type','academic_status','student_name','student_lastname','academic_institute'));
        return $pdf->stream();

    }
}