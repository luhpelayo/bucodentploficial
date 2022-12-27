<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function create(){
        return view ('student.addStudent');
    }

    public function edit($id){
        $estudiante = Student::findOrFail($id);
        return view('student.editStudent',compact('estudiante'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'student_name' => 'required|max:30',
            'student_lastname' => 'required|max:30',
            'student_register' => 'digits:9',
            'student_ci' => 'digits_between:7,15',
            'student_number' => 'digits:8',
            'student_image' => 'image',
        ]);
        $estudiante = Student::findOrFail($id);
        if ($request->hasFile('student_image')) {
            if ($estudiante->student_image != null) {
                Storage::disk('images')->delete($estudiante->student_image);
                $estudiante->student_image = null;
            }
            $estudiante->student_image = $request->file('student_image')->store('students','images');
        }
        $estudiante->student_name = $request->student_name;
        $estudiante->student_lastname = $request->student_lastname;
        $estudiante->student_register = $request->student_register;
        $estudiante->student_ci = $request->student_ci;
        $estudiante->student_exp = $request->student_exp;
        $estudiante->student_number = $request->student_number;
        $estudiante->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('student.show');

    }

    public function store(Request $request){
        $validated = $request->validate([
            'student_name' => 'required|max:30',
            'student_lastname' => 'required|max:30',
            'student_register' => 'required|unique:students|digits:9',
            'student_ci' => 'digits_between:7,15',
            'student_number' => 'digits:8',
            'student_image' => 'image',
        ]);
            if ($request->hasFile('student_image')) {
                $imagestd = $request->file('student_image')->store('students','images');
                $request->student_image = $imagestd;
            }
            
            $estudiante = new Student;
            $estudiante->student_name = $request->student_name;
            $estudiante->student_lastname = $request->student_lastname;
            $estudiante->student_register = $request->student_register;
            $estudiante->student_ci = $request->student_ci;
            $estudiante->student_exp = $request->student_exp;
            $estudiante->student_number = $request->student_number;
            $estudiante->student_image = $request->student_image;
            $estudiante->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('student.show');
    }

    public function show(){
        $students = Student::all();
        return view ('student.viewStudent', compact('students'));
    }

    public function destroy($id){
        $student = Student::findOrFail($id);
        if ($student->student_image != null) {
            Storage::disk('images')->delete($student->student_image);
        }
        $student->delete();
        alert()->success('Estudiante Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $students = Student::orderBy('student_lastname')->get();
        $fecha = Carbon::now();
        $cantidad = Student::count();   
        $pdf = PDF::loadView('student.staticpdf', compact('students','fecha','cantidad'));
        return $pdf->download('students.pdf');
    }

    public function allexcel(){
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    //REPORTES
    public function report()
    {
        return view('report.dynamic.student.data');
    }

    public function query(Request $request)
    {
        $consults = null;
        $name = $request->student_name;
        $lastname = $request->student_lastname;
        $register = $request->student_register;
        $ci = $request->student_ci;
        $exp = $request->student_exp;
        $number = $request->student_number;
        $consults = Student::select('*')->where(function ($query) use ($request){
            if ($request->student_name != null) {
                $query->where('student_name','LIKE','%'.$request->student_name.'%');
            }
            if ($request->student_lastname != null) {
                $query->where('student_lastname','LIKE','%'.$request->student_lastname.'%');
            }
            if ($request->student_register != null) {
                $query->where('student_register','LIKE','%'.$request->student_register.'%');
            }
            if ($request->student_ci != null) {
                $query->where('student_ci','LIKE','%'.$request->student_ci.'%');
            }
            if ($request->student_exp != null) {
                $query->where('student_exp','LIKE','%'.$request->student_exp.'%');
            }
            if ($request->student_number != null) {
                $query->where('student_number','LIKE','%'.$request->student_number.'%');
            }

        })->orderBy('student_lastname', 'ASC')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.student.pdf', compact('consults','fecha','cantidad','name','lastname','register','ci','exp','number'));
        return $pdf->stream();
    }

}