<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tomo;
use App\Models\Modality;
use App\Models\Category;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\TomosExport;
use Maatwebsite\Excel\Facades\Excel;
class TomoController extends Controller
{
    public function create(){
        $modalities = Modality::get();
        $categories = Category::get();
        $students = Student::get();
        return view ('graduated.tomos.addTomo', compact('modalities','categories','students'));
    }

    public function edit($id){
        //$tomo = Tomo::findOrFail($id);
        $tomo = Tomo::with('modality','category','student')->findOrFail($id);
        $modalities = Modality::get();
        $categories = Category::get();
        $students = Student::get();
        //dd($tomo);
        return view('graduated.tomos.editTomo',compact('tomo','modalities','categories','students'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'tomo_code' => 'required|unique:tomos',
            'tomo_title' => 'required|max:254',
            'tomo_consultant' => 'required',
            'tomo_year' => 'required|min:4|max:4',
            'modality_id' => 'required',
            'category_id' => 'required',
            'student_id' => 'required',
            'tomo_document' => 'mimes:pdf|max:20240',
        ]);
        if (DB::table('tomos')->where('student_id', $request->student_id)->doesntExist()) {
            if ($request->hasFile('tomo_document')) {
                $docutomo = $request->file('tomo_document')->store('tomos','documents');
                $request->tomo_document = $docutomo;
            }
            $tomo = new Tomo;
            $tomo->tomo_code = $request->tomo_code;
            $tomo->tomo_title = $request->tomo_title;
            $tomo->tomo_consultant = $request->tomo_consultant;
            $tomo->tomo_year = $request->tomo_year;
            $tomo->tomo_document = $request->tomo_document;
            $tomo->modality_id = $request->modality_id;
            $tomo->category_id = $request->category_id;
            $tomo->student_id = $request->student_id;
            $tomo->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('tomo.show');
        }
        alert()->error('Registro Duplicado','Intente de Nuevo')->position('top-end')->autoclose(2000);
        return back();
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'tomo_code' => 'required',
            'tomo_title' => 'required|max:254',
            'tomo_consultant' => 'required',
            'tomo_year' => 'required|min:4|max:4',
            'modality_id' => 'required',
            'category_id' => 'required',
            'student_id' => 'required',
            'tomo_document' => 'mimes:pdf|max:20240',
        ]);
        $tomo = Tomo::findOrFail($id);
        if ($request->hasFile('tomo_document')) {
            if ($tomo->tomo_document != null) {
                Storage::disk('documents')->delete($tomo->tomo_document);
                $tomo->tomo_document = null;
            }
            $docutomo = $request->file('tomo_document')->store('tomos','documents');
            $tomo->tomo_document = $docutomo;
        }
        $tomo->tomo_code = $request->tomo_code;
        $tomo->tomo_title = $request->tomo_title;
        $tomo->tomo_consultant = $request->tomo_consultant;
        $tomo->tomo_year = $request->tomo_year;
        $tomo->modality_id = $request->modality_id;
        $tomo->category_id = $request->category_id;
        $tomo->student_id = $request->student_id;
        $tomo->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('tomo.show');

    }

    public function show(){
        /*$tomos = DB::table('tomos')
            ->join('students', 'tomos.student_id', '=', 'students.id')
            ->join('modalities', 'tomos.modality_id', '=', 'modalities.id')
            ->join('categories', 'tomos.category_id', '=', 'categories.id')
            ->select('tomos.*', 'students.student_name' ,'students.student_lastname','modalities.modality_name','categories.category_name')
            ->get();*/
        $tomos = Tomo::with('modality','category','student')->get();
        //dd($tomos); die();
        return view ('graduated.tomos.viewTomo', compact('tomos'));
    }
    public function destroy($id){
        $tomo = Tomo::findOrFail($id);
        if ($tomo->tomo_document != null) {
            Storage::disk('documents')->delete($tomo->tomo_document);
        }
        $tomo->delete();
        alert()->success('Tomo Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $tomos = Tomo::with('modality','category','student')->orderBy('tomo_code')->get();
        $fecha = Carbon::now();
        $cantidad = Tomo::count();   
        $pdf = PDF::loadView('graduated.tomos.staticpdf', compact('tomos','fecha','cantidad'));
        return $pdf->download('tomos.pdf');
    }

    public function allexcel(){
        return Excel::download(new TomosExport, 'tomos.xlsx');
    }

    public function report()
    {
        $modalities = Modality::get();
        $categories = Category::get();
        return view('report.dynamic.graduated.tomos.data', compact('categories','modalities'));
    }

    public function query(Request $request){
        $consults = null;
        $category_id = $request->category_id;
        $modality_id = $request->modality_id;
        $student_name = $request->student_name;
        $student_lastname = $request->student_lastname;
        $tomo_consultant = $request->tomo_consultant;
        $year_min = $request->year_min;
        $year_max = $request->year_max;
        $tomo_title = $request->tomo_title;
        //dd($request->all()); die();
        $consults = Tomo::select('*')->where(function ($query) use ($request){
            if ($request->category_id != null) {
                $query->where('category_id','LIKE','%'.$request->category_id.'%');
            }
            if ($request->modality_id != null) {
                $query->where('modality_id','LIKE','%'.$request->modality_id.'%');
            }
            if ($request->tomo_consultant != null) {
                $query->where('tomo_consultant','LIKE','%'.$request->tomo_consultant.'%');
            }
            if ($request->year_min != null && $request->year_max != null) {
                $query->whereBetween('tomo_year', [$request->year_min, $request->year_max]);
            }
            if ($request->tomo_title != null) {
                $query->where('tomo_title','LIKE','%'.$request->tomo_title.'%');
            }
        })->whereHas('student', function($query) use ($request) {
            if ($request->student_name != null) {
                $query->where('student_name','LIKE','%'.$request->student_name.'%');  
            }else {
                $query->where('student_lastname','LIKE','%'.$request->student_lastname.'%');
            }
        })->orderBy('tomo_code', 'ASC')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.graduated.tomos.pdf', compact('consults','fecha','cantidad','modality_id','category_id','student_name','student_lastname','tomo_consultant','year_min','year_max','tomo_title'));
        return $pdf->setPaper('a4', 'landscape')->stream();

    }
}
