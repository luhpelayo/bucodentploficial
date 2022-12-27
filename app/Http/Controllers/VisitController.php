<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Visit;
use App\Models\VisitPhoto;
use App\Models\VisitDocument;
use App\Models\Matter;
use PDF;
use Carbon\Carbon;
use App\Exports\VisitsExport;
use Maatwebsite\Excel\Facades\Excel;

class VisitController extends Controller
{
    public function create(){
        $matters = Matter::get();
        return view ('visits.addvisit',compact('matters'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'matter_id' => 'required',
            'visit_date' => 'required',
            'visit_subjectuagrm' => 'required',
            'visit_company' => 'required',
            'visit_subjectcompany' => 'required',
        ]);
        //dd($request->all()); die();
            $visit = new Visit;
            $visit->visit_date = $request->visit_date;
            $visit->visit_subjectuagrm = $request->visit_subjectuagrm;
            $visit->visit_company = $request->visit_company;
            $visit->visit_subjectcompany = $request->visit_subjectcompany;
            $visit->matter_id = $request->matter_id;
            $visit->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('visit.show');
    }

    public function edit($id){
        $visit = Visit::with('matter')->findOrFail($id);
        $matters = Matter::get();
        //dd($tomo);
        return view('visits.editvisit',compact('visit','matters'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'matter_id' => 'required',
            'visit_date' => 'required',
            'visit_subjectuagrm' => 'required',
            'visit_company' => 'required',
            'visit_subjectcompany' => 'required',
        ]);
        //dd($request->all()); die();
        $visit = Visit::findOrFail($id);
        $visit->visit_date = $request->visit_date;
        $visit->visit_subjectuagrm = $request->visit_subjectuagrm;
        $visit->visit_company = $request->visit_company;
        $visit->visit_subjectcompany = $request->visit_subjectcompany;
        $visit->matter_id = $request->matter_id;
        $visit->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('visit.show');
    }

    public function show(){
        $visits = Visit::with('matter')->get();
        //dd($tomos); die();
        return view ('visits.viewvisit',compact('visits'));
    }

    public function destroy($id){
        $visit = Visit::findOrFail($id);
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

        $visit->delete();
        alert()->success('Visita y Archivos Eliminados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function addfiles($id){
        $visit = Visit::with('matter')->findOrFail($id);
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

    public function allpdf(){
        $visits = Visit::with('matter')->orderBy('visit_date','Asc')->get();
        $fecha = Carbon::now();
        $cantidad = Visit::count();   
        $pdf = PDF::loadView('visits.staticpdf', compact('visits','fecha','cantidad'));
        return $pdf->download('visitas.pdf');
    }

    public function allexcel(){
        return Excel::download(new VisitsExport, 'visitas.xlsx');
    }

    public function report()
    {
        $matters = Matter::get();
        return view('report.dynamic.visit.data', compact('matters'));
    }

    public function query(Request $request){
        $consults = null;
        $visit_subjectuagrm = $request->visit_subjectuagrm;
        $matter_id = $request->matter_id;
        $date_min = $request->date_min;
        $date_max = $request->date_max;
        $visit_company = $request->visit_company;
        $visit_subjectcompany = $request->visit_subjectcompany;
        //dd($request->all()); die();
        $consults = Visit::select('*')->where(function ($query) use ($request){
            if ($request->visit_subjectuagrm != null) {
                $query->where('visit_subjectuagrm','LIKE','%'.$request->visit_subjectuagrm.'%');
            }
            if ($request->matter_id != null) {
                $query->where('matter_id','LIKE','%'.$request->matter_id.'%');
            }
            if ($request->date_min != null && $request->date_max != null) {
                $query->whereBetween('visit_date', [$request->date_min, $request->date_max]);
            }
            if ($request->visit_company != null) {
                $query->where('visit_company','LIKE','%'.$request->visit_company.'%');
            }
            if ($request->visit_subjectcompany != null) {
                $query->where('visit_subjectcompany','LIKE','%'.$request->visit_subjectcompany.'%');
            }
        })->orderBy('visit_date', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.visit.pdf', compact('consults','fecha','cantidad','visit_subjectuagrm','matter_id','date_min','date_max','visit_company','visit_subjectcompany'));
        return $pdf->stream();

    }
}
