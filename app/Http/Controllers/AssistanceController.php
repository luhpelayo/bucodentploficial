<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Assistance;
use App\Models\Student;
use App\Models\Certificate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
use Carbon\Carbon;
use App\Exports\AssistanceExport;
use Maatwebsite\Excel\Facades\Excel;

class AssistanceController extends Controller
{
    public function create(){
        $trainings = Training::get();
        $students = Student::get();
        return view ('training.assistance.addassistance', compact('trainings','students'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'training_id' => 'required',
            'addMoreInputFields.*.student' => 'required',
        ]);
        //dd($request->addMoreInputFields, $request->training_id); die();
        foreach ($request->addMoreInputFields as $key => $value) {
            $student = Student::select('id')->where(DB::raw('CONCAT_WS(" ", student_lastname, student_name)'), 'like', '%' . $value['student'] . '%')->first();
            //$student = Student::select('id')->where(DB::raw('CONCAT_WS('', student_lastname, student_name)'), 'like', '%' . $value['student'] . '%')->first();
            //dd($value['student']); die();
            $assistance = new Assistance;
            $assistance->assistance_receipt = $value['receipt'];
            $assistance->assistance_payment = $value['payment'];
            $assistance->assistance_amount = $value['amount'];
            $assistance->training_id = $request->training_id;
            $assistance->student_id = $student->id;
            $assistance->save();
        }
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('assist.showlist', $request->training_id);
        //return back();
    }

    public function destroy($id){
        $assistance = Assistance::findOrFail($id);
        if (DB::table('certificates')->where('student_id', $assistance->student_id)->exists()) {
            $certificates = Certificate::where('student_id',$assistance->student_id)->get();
            foreach ($certificates as $certificate) {
                Storage::disk('images')->delete($certificate->certificate_qr);
                Storage::disk('documents')->delete($certificate->certificate_document);
                $certificate->delete();
            }
        }
        $assistance->delete();
        alert()->success('Datos y Certificados Eliminados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function show(){
        $trainings = Training::get();
        return view ('training.assistance.viewassistance', compact('trainings'));
    } 

    public function showlist($id){
        $training = Training::findOrFail($id);
        $assistances = Assistance::where('training_id', $id)->with('training','student')->get();
        return view ('training.assistance.viewassistancelist', compact('assistances','training'));
    }

    public function allpdf($id){
        $training = Training::findOrFail($id);
        $assistances = Assistance::where('training_id', $id)->with('training','student')->orderBy('assistance_payment', 'Asc')->get();
        $fcet = Assistance::where('training_id', $id)->where('assistance_payment', 'C-FCET')->count();
        $dep = Assistance::where('training_id', $id)->where('assistance_payment', 'Dep. Banco')->count();
        $trans = Assistance::where('training_id', $id)->where('assistance_payment', 'Tranf. Banco')->count();
        $fecha = Carbon::now();   
        $pdf = PDF::loadView('training.assistance.staticpdf', compact('assistances','fcet','dep','trans','fecha','training'));
        return $pdf->setPaper('a4', 'landscape')->download('listado '.$training->training_name.'.pdf');
    }

    public function allexcel($id) {
        $training = Training::findOrFail($id);
        return Excel::download(new AssistanceExport($id), 'listado '.$training->training_name.'.xlsx');
    }

}
