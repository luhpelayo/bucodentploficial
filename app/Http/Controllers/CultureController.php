<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Culture;
use App\Models\Student;
use PDF;
use Carbon\Carbon;
use App\Exports\CulturesExport;
use Maatwebsite\Excel\Facades\Excel;
class CultureController extends Controller
{
    public function create(){
        $students = Student::get();
        return view ('tracking.culture.addculture', compact('students'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'culture_name' => 'required|max:50',
            'culture_level' => 'required',
            'student_id3' => 'required',
        ]);
        //dd($request->all()); die();
        $culture = new Culture;
        $culture->culture_name = $request->culture_name;
        $culture->culture_level = $request->culture_level;
        $culture->student_id = $request->student_id3;
        $culture->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('acad.show');

    }

    public function edit($id){
        $culture = Culture::with('student')->findOrFail($id);
        return view('tracking.culture.editculture',compact('culture'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'culture_name' => 'required|max:50',
            'culture_level' => 'required',
        ]);
        //dd($request->all()); die();
        $culture = Culture::findOrFail($id);
        $culture->culture_name = $request->culture_name;
        $culture->culture_level = $request->culture_level;
        $culture->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('cult.show');
    }

    public function show(){
        $cultures = Culture::with('student')->get();
        return view ('tracking.culture.viewculture', compact('cultures'));
    }

    public function destroy($id){
        $culture = Culture::findOrFail($id);
        $culture->delete();
        alert()->success('Actividad Cultural Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $cultures = Culture::with('student')->orderBy('culture_level')->get();
        $fecha = Carbon::now();
        $cantidad = Culture::count();   
        $pdf = PDF::loadView('tracking.culture.staticpdf', compact('cultures','fecha','cantidad'));
        return $pdf->download('cultures_tracking.pdf');
    }

    public function allexcel(){
        return Excel::download(new CulturesExport, 'cultures_tracking.xlsx');
    }

    public function report()
    {
        $students = Student::get();
        return view('report.dynamic.tracking.culture.data', compact('students'));
    }

    public function query(Request $request){
        $consults = null;
        $student_id = $request->student_id;
        $culture_level = $request->culture_level;
        $student_name = $request->student_name;
        $student_lastname = $request->student_lastname;
        $culture_name = $request->culture_name;
        //dd($request->all()); die();
        $consults = Culture::select('*')->where(function ($query) use ($request){
            if ($request->student_id != null) {
                $query->where('student_id','LIKE','%'.$request->student_id.'%');
            }
            if ($request->culture_level != null) {
                $query->where('culture_level','LIKE','%'.$request->culture_level.'%');
            }
            if ($request->culture_name != null) {
                $query->where('culture_name','LIKE','%'.$request->culture_name.'%');
            }
        })->whereHas('student', function($query) use ($request) {
            if ($request->student_name != null) {
                $query->where('student_name','LIKE','%'.$request->student_name.'%');  
            }else {
                $query->where('student_lastname','LIKE','%'.$request->student_lastname.'%');
            }
        })->orderBy('culture_level', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.tracking.culture.pdf', compact('consults','fecha','cantidad','student_id','culture_level','student_name','student_lastname','culture_name'));
        return $pdf->stream();

    }
}
