<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Matter;
use App\Models\Company;
use App\Models\Practice;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\PracticesExport;
use Maatwebsite\Excel\Facades\Excel;
class PracticeController extends Controller
{
    public function create(){
        $students = Student::get();
        $matters = Matter::get();
        $companies = Company::get();
        return view ('practiceind.addpractice',compact('students','matters','companies'));
    }

    //recupera el valor de matter_teacher en base al ID y lo visualiza via ajax
    public function auxiliar(Request $request){
        try {
            $matter_teacher = Matter::select('matter_teacher')->where('id',$request->matter_id2)->first();
            $teacher = $matter_teacher->matter_teacher;
            return response()->json($teacher);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request){
        $validated = $request->validate([
            'matter_id2' => 'required',
            'student_id' => 'required',
            'company_id' => 'required',
            'practice_date' => 'required',
            'practice_description' => 'required',
        ]);
        //dd($request->all()); die();
        $practice = new Practice;
        $practice->practice_date = $request->practice_date;
        $practice->practice_description = $request->practice_description;
        $practice->matter_id = $request->matter_id2;
        $practice->student_id = $request->student_id;
        $practice->company_id = $request->company_id;
        $practice->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('practice.show');
    }
    public function show(){
        $practices = Practice::with('student','company','matter')->get();
        //dd($tomos); die();
        return view ('practiceind.viewpractices',compact('practices'));
    }

    public function edit($id){
        $practice = Practice::with('student','company','matter')->findOrFail($id);
        $students = Student::get();
        $matters = Matter::get();
        $companies = Company::get();
        //dd($tomo);
        return view('practiceind.editpractice',compact('practice','students','matters','companies'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'matter_id2' => 'required',
            'student_id' => 'required',
            'company_id' => 'required',
            'practice_date' => 'required',
            'practice_description' => 'required',
        ]);
        $practice = Practice::findOrFail($id);
        $practice->practice_date = $request->practice_date;
        $practice->practice_description = $request->practice_description;
        $practice->matter_id = $request->matter_id2;
        $practice->student_id = $request->student_id;
        $practice->company_id = $request->company_id;
        $practice->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('practice.show');
    }

    public function destroy($id){
        $practice = Practice::findOrFail($id);
        $practice->delete();
        alert()->success('Práctica Eliminada','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $practices = Practice::with('student','company','matter')->orderBy('practice_date','Desc')->get();
        $fecha = Carbon::now();
        $cantidad = Practice::count();   
        $pdf = PDF::loadView('practiceind.staticpdf', compact('practices','fecha','cantidad'));
        return $pdf->setPaper('a4', 'landscape')->download('practicas.pdf');
    }

    public function allexcel(){
        return Excel::download(new PracticesExport, 'Practicas.xlsx');
    }

    public function report()
    {
        $students = Student::get();
        $matters = Matter::get();
        $companies = Company::get();
        return view('report.dynamic.practice.data', compact('students','matters','companies'));
    }

    public function query(Request $request){
        $consults = null;
        $student_id = $request->student_id;
        $matter_id = $request->matter_id;
        $student_name = $request->student_name;
        $student_lastname = $request->student_lastname;
        $date_min = $request->date_min;
        $date_max = $request->date_max;
        $practice_description = $request->practice_description;
        $company_id = $request->company_id;
        //dd($request->all()); die();
        $consults = Practice::select('*')->where(function ($query) use ($request){
            if ($request->student_id != null) {
                $query->where('student_id','LIKE','%'.$request->student_id.'%');
            }
            if ($request->matter_id != null) {
                $query->where('matter_id','LIKE','%'.$request->matter_id.'%');
            }
            if ($request->date_min != null && $request->date_max != null) {
                $query->whereBetween('practice_date', [$request->date_min, $request->date_max]);
            }
            if ($request->practice_description != null) {
                $query->where('practice_description','LIKE','%'.$request->practice_description.'%');
            }
            if ($request->company_id != null) {
                $query->where('company_id','LIKE','%'.$request->company_id.'%');
            }
        })->whereHas('student', function($query) use ($request) {
            if ($request->student_name != null) {
                $query->where('student_name','LIKE','%'.$request->student_name.'%');  
            }else {
                $query->where('student_lastname','LIKE','%'.$request->student_lastname.'%');
            }
        })->orderBy('practice_date', 'Desc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.practice.pdf', compact('consults','fecha','cantidad','student_id','matter_id','student_name','student_lastname','date_min','date_max','practice_description','company_id'));
        return $pdf->setPaper('a4', 'landscape')->stream();

    }

}
