<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\InvestigationTrace;
use App\Models\Investigation;
use App\Models\InvestigationPhoto;
use App\Models\InvestigationDocument;
use PDF;
use Carbon\Carbon;
class InvestigationTraceController extends Controller
{
    public function create(){
        $investigations = Investigation::get();
        return view ('laboratory.investigationtraces.addtraceinvestigation',compact('investigations'));
    }

    //recupera el valor de investigation_id y muestra toda su informacion via AJAX
    public function auxiliar(Request $request){
        try {
            $investigation = Investigation::findOrFail($request->investigation_id2);
            return response()->json($investigation);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request){
        $validated = $request->validate([
            'investigation_id2' => 'required',
        ]);
        //dd($request->all()); die();
        $trace = new InvestigationTrace;
        $trace->investigation_id = $request->investigation_id2;
        $trace->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('investigationtrace.show');
    }

    public function show(){
        $traces = InvestigationTrace::with('investigation')->get();
        //dd($traces); die();
        return view ('laboratory.investigationtraces.viewtraceinvestigation',compact('traces'));
    }

    public function destroy($id){
        $trace = InvestigationTrace::findOrFail($id);
        //ELIMINANDO IMAGENES DEL SEGUIMIENTO DESDE LA BD & STORAGE
        if (DB::table('investigation_photos')->where('investigationtrace_id', $id)->exists()) {
            $photos = InvestigationPhoto::where('investigationtrace_id',$id)->get();
            foreach ($photos as $photo) {
                Storage::disk('images')->delete($photo->investigationphoto_route);
            }
        }

        //ELIMINANDO DOCUMENTOS DEL SEGUIMIENTO DESDE LA BD & STORAGE
        if (DB::table('investigation_documents')->where('investigationtrace_id', $id)->exists()) {
            $documents = InvestigationDocument::where('investigationtrace_id',$id)->get();
            foreach ($documents as $document) {
                Storage::disk('documents')->delete($document->investigationdocument_route);
            }
        }

        $trace->delete();
        alert()->success('Seguimiento y Archivos Eliminados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function addfiles($id){
        $trace = InvestigationTrace::with('investigation')->findOrFail($id);
        //dd($tomo);
        return view('laboratory.investigationtraces.files',compact('trace'));
    }

    public function storefiles(Request $request, $id){
        //dd($id); die();
        if ($request->hasFile('trace_images')) {
            $images = $request->file('trace_images');
            foreach ($images as $image) {
                $imagetrace = $image->store('photosTrace','images');
                $invphoto = new InvestigationPhoto;
                $invphoto->investigationphoto_route = $imagetrace;
                $invphoto->investigationtrace_id = $id;
                $invphoto->save();
            }
        }
        if ($request->hasFile('trace_documents')) {
            $documents = $request->file('trace_documents');
            foreach ($documents as $document) {
                $documenttrace = $document->store('pdfTrace','documents');
                $invdocu = new InvestigationDocument;
                $invdocu->investigationdocument_route = $documenttrace;
                $invdocu->investigationtrace_id = $id;
                $invdocu->save();
            }
        }
        alert()->success('Archivos Cargados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('investigationtrace.show');
    }

    public function showimages($id){
        $trace = InvestigationTrace::with('investigation','documents','photos')->findOrFail($id);
        $photos = InvestigationPhoto::where('investigationtrace_id',$id)->get();
        //dd($photos); die();
        return view ('laboratory.investigationtraces.photos',compact('trace', 'photos'));
    }

    public function showpdfs($id){
        $trace = InvestigationTrace::with('investigation','documents','photos')->findOrFail($id);
        $documents = InvestigationDocument::where('investigationtrace_id',$id)->get();
        //dd($photos); die();
        return view ('laboratory.investigationtraces.documents',compact('trace', 'documents'));
    }

    public function destroyimage($id){
        $photo = InvestigationPhoto::findOrFail($id);
        Storage::disk('images')->delete($photo->investigationphoto_route);
        $photo->delete();
        alert()->success('Imagen Eliminada','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function destroypdf($id){
        $document = InvestigationDocument::findOrFail($id);
        Storage::disk('documents')->delete($document->investigationdocument_route);
        $document->delete();
        alert()->success('Documento Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function downimage($id){
        $photo = InvestigationPhoto::findOrFail($id);
        return Storage::disk('images')->download($photo->investigationphoto_route);
    }

    public function downpdf($id){
        $document = InvestigationDocument::findOrFail($id);
        return Storage::disk('documents')->download($document->investigationdocument_route);
    }

    public function report()
    {
        $investigations = Investigation::get();
        return view('report.dynamic.laboratory.trace.data',compact('investigations'));
    }

    public function query(Request $request){
        $consults = null;
        $investigation_id = $request->investigation_id;
        $investigation_subject = $request->investigation_subject;
        $date_min = $request->date_min;
        $date_max = $request->date_max;
        $investigation_name = $request->investigation_name;
        //dd($request->all()); die();
        $consults = InvestigationTrace::select('*')->where(function ($query) use ($request){
            if ($request->investigation_id != null) {
                $query->where('investigation_id','LIKE','%'.$request->investigation_id.'%');
            }
            if ($request->date_min != null && $request->date_max != null) {
                $query->whereBetween('created_at', [$request->date_min, $request->date_max]);
            }
        })->whereHas('investigation', function($query) use ($request) {
            if ($request->investigation_subject != null) {
                $query->where('investigation_subject','LIKE','%'.$request->investigation_subject.'%');
            }
            if ($request->investigation_name != null) {
                $query->where('investigation_name','LIKE','%'.$request->investigation_name.'%');
            }
        })->orderBy('investigation_id', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.laboratory.trace.pdf', compact('consults','fecha','cantidad','investigation_id','investigation_subject','date_min','date_max','investigation_name'));
        return $pdf->stream();

    }
}