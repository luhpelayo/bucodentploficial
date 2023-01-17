<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\ArchivosExport;
use Maatwebsite\Excel\Facades\Excel;

class ArchivoController extends Controller
{
    public function create(){
        return view ('archivo.addArchivo');
    }

    public function edit($id){
        $archivo = Archivo::findOrFail($id);
        return view('archivo.editArchivo',compact('archivo'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'descripcion' => 'required|max:30',
        ]);
        $archivo = Archivo::findOrFail($request->id);
        $archivo->descripcion = $request->descripcion;
        $archivo->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('archivo.show');

    }

    public function store(Request $request){
        $validated = $request->validate([
            'descripcion' => 'required|max:30',
        ]);
       
        
            
            $archivo = new Archivo;
            $archivo->descripcion = $request->descripcion;
            $archivo->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('archivo.show');
    }

    public function show(){
        $archivos = Archivo::all();
        return view ('archivo.viewArchivo', compact('archivos'));
    }

    public function destroy($id){
        $archivo = Archivo::findOrFail($id);
        if ($archivo->paciente_image != null) {
            Storage::disk('images')->delete($archivo->paciente_image);
        }
        //ELIMINANDO IMAGENES DE LA VISITA DESDE LA BD & STORAGE
        if (DB::table('visit_photos')->where('visit_id', $id)->exists()) {
            $photos = VisitPhoto::where('visit_id',$id)->get();
            foreach ($photos as $photo) {
                Storage::disk('images')->delete($photo->visitphoto_route);
            }
        }

        //ELIMINANDO DOCUMENTOS DE LA VISITA DESDE LA BD & STORAGE
        if (DB::table('visit_documents')->where('visit_id', $id)->exists()) {
            $documents = VisitDocument::where('visit_id',$id)->get();
            foreach ($documents as $document) {
                Storage::disk('documents')->delete($document->visitdocument_route);
            }
        }
        $archivo->delete();
        alert()->success('Archivo Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $archivos = Archivo::orderBy('descripcion')->get();
        $fecha = Carbon::now();
        $cantidad = Archivo::count();   
        $pdf = PDF::loadView('archivo.staticpdf', compact('archivos','fecha','cantidad'));
        return $pdf->download('archivo.pdf');
    }

    public function allexcel(){
        return Excel::download(new ArchivosExport, 'archivos.xlsx');
    }

    //REPORTES
    public function report()
    {
        return view('report.dynamic.archivo.data');
    }

    public function query(Request $request)
    {
        $consults = null;
        $descripcion = $request->descripcion;
        $consults = Archivo::select('*')->where(function ($query) use ($request){

            if ($request->descripcion != null) {
                $query->where('descripcion','LIKE','%'.$request->descripcion.'%');
            }

        })->orderBy('descripcion', 'ASC')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.archivo.pdf', compact('consults','fecha','cantidad','descripcion'));
        return $pdf->stream();
    }

    public function addfiles($id){
        $archivo = Archivo::findOrFail($id);
        //dd($tomo);
        return view('visits.files',compact('visit'));
    }

    public function storefiles(Request $request, $id){
        //dd($id); die();
        if ($request->hasFile('visit_images')) {
            $images = $request->file('visit_images');
            foreach ($images as $image) {
                $imagevisit = $image->store('photosVisit','images');
                $visitphoto = new VisitPhoto;
                $visitphoto->visitphoto_route = $imagevisit;
                $visitphoto->visit_id = $id;
                $visitphoto->save();
            }
        }
        if ($request->hasFile('visit_documents')) {
            $documents = $request->file('visit_documents');
            foreach ($documents as $document) {
                $documentvisit = $document->store('pdfVisit','documents');
                $visitdocu = new VisitDocument;
                $visitdocu->visitdocument_route = $documentvisit;
                $visitdocu->visit_id = $id;
                $visitdocu->save();
            }
        }
        alert()->success('Archivos Cargados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('visit.show');
    }

    public function showimages($id){
        $photos = VisitPhoto::where('visit_id',$id)->get();
        //dd($photos); die();
        return view ('visits.photos',compact('photos'));
    }

    public function destroyimage($id){
        $photo = VisitPhoto::findOrFail($id);
        Storage::disk('images')->delete($photo->visitphoto_route);
        $photo->delete();
        alert()->success('Imagen Eliminada','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function downimage($id){
        $photo = VisitPhoto::findOrFail($id);
        return Storage::disk('images')->download($photo->visitphoto_route);
    }

    public function showpdfs($id){
        $documents = VisitDocument::where('visit_id',$id)->get();
        //dd($photos); die();
        return view ('visits.documents',compact('documents'));
    }

    public function destroypdf($id){
        $document = VisitDocument::findOrFail($id);
        Storage::disk('documents')->delete($document->visitdocument_route);
        $document->delete();
        alert()->success('Documento Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function downpdf($id){
        $document = VisitDocument::findOrFail($id);
        return Storage::disk('documents')->download($document->visitdocument_route);
    }
}
