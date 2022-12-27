<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Matter;
use App\Models\LaboratoryPhoto;
use App\Models\LabPhoto;
use PDF;
use Carbon\Carbon;
use App\Exports\laboratoriesExport;
use Maatwebsite\Excel\Facades\Excel;
class LaboratoryPhotoController extends Controller
{
    public function create(){
        $matters = Matter::get();
        return view ('laboratory.photos.addphotolaboratory',compact('matters'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'labphoto_name' => 'required|unique:laboratory_photos',
            'labphoto_date' => 'required',
            'labphoto_subject' => 'required|max:254',
            'matter_id' => 'required',
        ]);
        //dd($request->all()); die();
            $laboratory = new LaboratoryPhoto;
            $laboratory->labphoto_date = $request->labphoto_date;
            $laboratory->labphoto_name = $request->labphoto_name;
            $laboratory->labphoto_subject = $request->labphoto_subject;
            $laboratory->matter_id = $request->matter_id;
            $laboratory->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('photolab.show');
    }

    public function edit($id){
        $laboratory = LaboratoryPhoto::with('matter')->findOrFail($id);
        $matters = Matter::get();
        //dd($tomo);
        return view('laboratory.photos.editaphotolaboratory',compact('laboratory','matters'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'labphoto_name' => 'required',
            'labphoto_date' => 'required',
            'labphoto_subject' => 'required|max:254',
            'matter_id' => 'required',
        ]);
        //dd($request->all()); die();
        $laboratory = LaboratoryPhoto::findOrFail($id);
        $laboratory->labphoto_date = $request->labphoto_date;
        $laboratory->labphoto_name = $request->labphoto_name;
        $laboratory->labphoto_subject = $request->labphoto_subject;
        $laboratory->matter_id = $request->matter_id;
        $laboratory->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('photolab.show');
    }

    public function show(){
        $laboratories = LaboratoryPhoto::with('matter')->get();
        //dd($tomos); die();
        return view ('laboratory.photos.viewphotolaboratory',compact('laboratories'));
    }

    public function destroy($id){
        $laboratory = LaboratoryPhoto::findOrFail($id);
        //ELIMINANDO IMAGENES DEL SEGUIMIENTO DESDE LA BD & STORAGE
        if (DB::table('lab_photos')->where('laboratoryphoto_id', $id)->exists()) {
            $photos = LabPhoto::where('laboratoryphoto_id',$id)->get();
            foreach ($photos as $photo) {
                Storage::disk('images')->delete($photo->laboratoryphoto_route);
            }
        }
        $laboratory->delete();
        alert()->success('Laboratorio y Fotos Eliminados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function addfiles($id){
        $laboratory = LaboratoryPhoto::with('matter')->findOrFail($id);
        //dd($tomo);
        return view('laboratory.photos.files',compact('laboratory'));
    }

    public function storefiles(Request $request, $id){
        //dd($request->all()); die();
        $images = $request->file('lab_images');
        foreach ($images as $image) {
            $imagelab = $image->store('photosLab','images');
            $labphoto = new LabPhoto;
            $labphoto->laboratoryphoto_route = $imagelab;
            $labphoto->laboratoryphoto_id = $id;
            $labphoto->save();
        }
        alert()->success('Imagenes Cargadas','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('photolab.show');
    }

    public function showimages($id){
        $labphotos = LabPhoto::where('laboratoryphoto_id',$id)->get();
        //dd($photos); die();
        return view ('laboratory.photos.photos',compact('labphotos'));
    }

    public function destroyimage($id){
        $photo = LabPhoto::findOrFail($id);
        Storage::disk('images')->delete($photo->laboratoryphoto_route);
        $photo->delete();
        alert()->success('Imagen Eliminada','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function downimage($id){
        $photo = LabPhoto::findOrFail($id);
        return Storage::disk('images')->download($photo->laboratoryphoto_route);
    }

    public function allpdf(){
        $laboratories = LaboratoryPhoto::with('matter')->orderBy('labphoto_date','Desc')->get();
        $fecha = Carbon::now();
        $cantidad = LaboratoryPhoto::count();   
        $pdf = PDF::loadView('laboratory.photos.staticpdf', compact('laboratories','fecha','cantidad'));
        return $pdf->download('laboratories.pdf');
    }

    public function allexcel(){
        return Excel::download(new LaboratoriesExport, 'laboratorios.xlsx');
    }

    public function report()
    {
        $matters = Matter::get();
        return view('report.dynamic.laboratory.laboratory.data', compact('matters'));
    }

    public function query(Request $request){
        $consults = null;
        $labphoto_name = $request->labphoto_name;
        $matter_id = $request->matter_id;
        $date_min = $request->date_min;
        $date_max = $request->date_max;
        $labphoto_subject = $request->labphoto_subject;
        //dd($request->all()); die();
        $consults = LaboratoryPhoto::select('*')->where(function ($query) use ($request){
            if ($request->labphoto_name != null) {
                $query->where('labphoto_name','LIKE','%'.$request->labphoto_name.'%');
            }
            if ($request->matter_id != null) {
                $query->where('matter_id','LIKE','%'.$request->matter_id.'%');
            }
            if ($request->date_min != null && $request->date_max != null) {
                $query->whereBetween('labphoto_date', [$request->date_min, $request->date_max]);
            }
            if ($request->labphoto_subject != null) {
                $query->where('labphoto_subject','LIKE','%'.$request->labphoto_subject.'%');
            }
        })->orderBy('labphoto_date', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.laboratory.laboratory.pdf', compact('consults','fecha','cantidad','labphoto_name','matter_id','date_min','date_max','labphoto_subject'));
        return $pdf->stream();

    }

}
