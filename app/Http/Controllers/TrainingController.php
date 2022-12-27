<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\TrainingDocument;
use App\Models\TrainingImage;
use App\Models\Template;
use App\Models\Certificate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
use Carbon\Carbon;
use App\Exports\TrainingsExport;
use Maatwebsite\Excel\Facades\Excel;
class TrainingController extends Controller
{
    public function create(){
        return view ('training.addtraining');
    }

    public function edit($id){
        $training = Training::findOrFail($id);
        return view('training.edittraining',compact('training'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'training_name' => 'required|max:100',
            'training_stardate' => 'required|date',
            'training_endate' => 'required|date|after:training_stardate',
            'training_teacher' => 'required|max:50',
            'training_quantity' => 'required|min:1|max:3',
            'training_money' => 'required|min:1|max:6',
        ]);
        $training = Training::findOrFail($id);
        //dd($request->all()); die();
        $training->training_name = $request->training_name;
        $training->training_stardate = $request->training_stardate;
        $training->training_endate = $request->training_endate;
        $training->training_teacher = $request->training_teacher;
        $training->training_quantity = $request->training_quantity;
        $training->training_money = $request->training_money;
        $training->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('tra.show');

    }

    public function store(Request $request){
        $validated = $request->validate([
            'training_name' => 'required|unique:trainings|max:100',
            'training_stardate' => 'required|date',
            'training_endate' => 'required|date|after:training_stardate',
            'training_teacher' => 'required|max:50',
            'training_quantity' => 'required|min:1|max:3',
            'training_money' => 'required|min:1|max:6',
        ]);

        $training = new Training;
        $training->training_name = $request->training_name;
        $training->training_stardate = $request->training_stardate;
        $training->training_endate = $request->training_endate;
        $training->training_teacher = $request->training_teacher;
        $training->training_quantity = $request->training_quantity;
        $training->training_money = $request->training_money;
        $training->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('tra.show');
    }

    public function show(){
        $trainings = Training::all();
        //dd($tomos); die();
        return view ('training.viewtraining', compact('trainings'));
    }

    public function addfiles($id){
        $training = Training::findOrFail($id);
        //dd($tomo);
        return view('training.files',compact('training'));
    }

    public function storefiles(Request $request, $id){
        //dd($id); die();
        if ($request->hasFile('training_images')) {
            $images = $request->file('training_images');
            foreach ($images as $image) {
                $imagetraining = $image->store('photosTraining','images');
                $trainingphoto = new TrainingImage;
                $trainingphoto->trainingimage_route = $imagetraining;
                $trainingphoto->training_id = $id;
                $trainingphoto->save();
            }
        }
        if ($request->hasFile('training_documents')) {
            $documents = $request->file('training_documents');
            foreach ($documents as $document) {
                $documenttraining = $document->store('pdfTraining','documents');
                $trainingdocu = new TrainingDocument;
                $trainingdocu->trainingdocument_route = $documenttraining;
                $trainingdocu->training_id = $id;
                $trainingdocu->save();
            }
        }
        alert()->success('Archivos Cargados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('tra.show');
    }

    public function showimages($id){
        $training = Training::with('images')->findOrFail($id);
        $photos = TrainingImage::where('training_id',$id)->get();
        //dd($photos); die();
        return view ('training.photos',compact('training', 'photos'));
    }

    public function showpdfs($id){
        $training = Training::with('documents')->findOrFail($id);
        $documents = TrainingDocument::where('training_id',$id)->get();
        //dd($photos); die();
        return view ('training.documents',compact('training', 'documents'));
    }

    public function destroyimage($id){
        $photo = TrainingImage::findOrFail($id);
        Storage::disk('images')->delete($photo->trainingimage_route);
        $photo->delete();
        alert()->success('Imagen Eliminada','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function destroypdf($id){
        $document = TrainingDocument::findOrFail($id);
        Storage::disk('documents')->delete($document->trainingdocument_route);
        $document->delete();
        alert()->success('Documento Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function downpdf($id){
        $document = TrainingDocument::findOrFail($id);
        return Storage::disk('documents')->download($document->trainingdocument_route);
    }

    public function downimage($id){
        $photo = TrainingImage::findOrFail($id);
        return Storage::disk('images')->download($photo->trainingimage_route);
    }

    public function destroy($id){
        $training = Training::findOrFail($id);
        //ELIMINANDO DOCUMENTOS DEL CURSO DESDE LA BD & STORAGE
        if (DB::table('training_documents')->where('training_id', $id)->exists()) {
            $documents = TrainingDocument::where('training_id',$id)->get();
            foreach ($documents as $document) {
                Storage::disk('documents')->delete($document->trainingdocument_route);
            }
        }

        //ELIMINANDO IMAGENES DEL CURSO DESDE LA BD & STORAGE
        if (DB::table('training_images')->where('training_id', $id)->exists()) {
            $photos = TrainingImage::where('training_id',$id)->get();
            foreach ($photos as $photo) {
                Storage::disk('images')->delete($photo->trainingimage_route);
            }
        }

        //ELIMINANDO CERTIFICADOS Y TEMPLATE DEL CURSO DESDE LA BD & STORAGE
        if (DB::table('templates')->where('training_id', $id)->exists()) {
            $template = Template::where('training_id',$id)->first();
            if (DB::table('certificates')->where('template_id', $template->id)->exists()) {
                $certificates = Certificate::where('template_id',$template->id)->get();
                foreach ($certificates as $certificate) {
                    Storage::disk('images')->delete($certificate->certificate_qr);
                    Storage::disk('documents')->delete($certificate->certificate_document);
                    $certificate->delete();
                }
            }
            Storage::disk('documents')->delete($template->template_document);
        }
        $training->delete();
        alert()->success('Curso y Archivos Eliminados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $trainings = Training::orderBy('training_stardate','Asc')->get();
        $fecha = Carbon::now();
        $cantidad = Training::count();   
        $pdf = PDF::loadView('training.staticpdf', compact('trainings','fecha','cantidad'));
        return $pdf->download('trainings.pdf');
    }

    public function allexcel(){
        return Excel::download(new TrainingsExport, 'trainings.xlsx');
    }

    //REPORTES
    public function report()
    {
        return view('report.dynamic.training.data');
    }

    public function query(Request $request)
    {
        $consults = null;
        $training_name = $request->training_name;
        $training_teacher = $request->training_teacher;
        $quantity_min = $request->quantity_min;
        $quantity_max = $request->quantity_max;
        $money_min = $request->money_min;
        $money_max = $request->money_max;
        $date_min = $request->date_min;
        $date_max = $request->date_max;
        $consults = Training::select('*')->where(function ($query) use ($request){
            if ($request->training_name != null) {
                $query->where('training_name','LIKE','%'.$request->training_name.'%');
            }
            if ($request->training_teacher != null) {
                $query->where('training_teacher','LIKE','%'.$request->training_teacher.'%');
            }
            if ($request->quantity_min != null && $request->quantity_max != null) {
                $query->whereBetween('training_quantity', [$request->quantity_min, $request->quantity_max]);
            }
            if ($request->money_min != null && $request->money_max != null) {
                $query->whereBetween('training_money', [$request->money_min, $request->money_max]);
            }
            if ($request->date_min != null && $request->date_max != null) {
                $query->whereBetween('training_stardate', [$request->date_min, $request->date_max]);
            }
        })->orderBy('training_stardate', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.training.pdf', compact('consults','fecha','cantidad','training_name','training_teacher','quantity_min','quantity_max','money_min','money_max','date_min','date_max'));
        return $pdf->stream();
    }

}