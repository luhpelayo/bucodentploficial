<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Assistance;
use App\Models\Student;
use App\Models\Template;
use App\Models\Certificate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
use Carbon\Carbon;
class TemplateController extends Controller
{
    public function create(){
        $trainings = Training::get();
        return view ('training.template.addtemplate', compact('trainings'));
    }

    //recupera el valor de training_id y muestra toda su informacion via AJAX
    public function auxiliar(Request $request){
        try {
            $training = Training::findOrFail($request->training_id);
            return response()->json($training);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request){
        $validated = $request->validate([
            'training_id' => 'required|unique:templates',
            'template_document' => 'required|mimes:pdf|max:20240',
        ]);
            if ($request->hasFile('template_document')) {
                $docutemp = $request->file('template_document')->store('templates','documents');
                $request->template_document = $docutemp;
            }
            $template = new Template;
            $template->template_document = $request->template_document;
            $template->training_id = $request->training_id;
            $template->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('temp.show');
    }

    public function edit($id){
        $template = Template::with('training')->findOrFail($id);
        return view('training.template.edittemplate',compact('template'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'template_document' => 'required|mimes:pdf|max:20240',
        ]);
        $template = Template::findOrFail($id);
        if ($request->hasFile('template_document')) {
            Storage::disk('documents')->delete($template->template_document);
            $template->template_document = null;
            $docutemplate = $request->file('template_document')->store('templates','documents');
            $template->template_document = $docutemplate;
        }

        $template->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('temp.show');

    }

    public function show(){
        $templates = Template::with('training')->get();
        return view ('training.template.viewtemplate', compact('templates'));
    }

    public function destroy($id){
        $template = Template::findOrFail($id);
        //ELIMINANDO CERTIFICADOS (QR & DOCUMENTOS) DEL CURSO DESDE LA BD & STORAGE
        if (DB::table('certificates')->where('template_id', $id)->exists()) {
            $certificates = Certificate::where('template_id',$id)->get();
            foreach ($certificates as $certificate) {
                Storage::disk('images')->delete($certificate->certificate_qr);
                Storage::disk('documents')->delete($certificate->certificate_document);
            }
        }
        Storage::disk('documents')->delete($template->template_document);
        $template->delete();
        alert()->success('Plantilla y Certificados Eliminados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }
}