<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Letter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\LettersExport;
use Maatwebsite\Excel\Facades\Excel;

class LetterController extends Controller
{
    public function create(){
        $areas = Area::get();
        return view ('docus.letter.addletter', compact('areas'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'letter_code' => 'required|unique:letters',
            'letter_name' => 'required|max:254',
            'letter_date' => 'required',
            'area_id' => 'required',
            'letter_document' => 'required|mimes:pdf|max:20240',
        ]);
        if ($request->hasFile('letter_document')) {
            $lettertomo = $request->file('letter_document')->store('letters','documents');
            $request->letter_document = $lettertomo;
        }
        //dd($request->all()); die();
        $letter = new Letter;
        $letter->letter_code = $request->letter_code;
        $letter->letter_name = $request->letter_name;
        $letter->letter_date = $request->letter_date;
        $letter->letter_document = $request->letter_document;
        $letter->area_id = $request->area_id;
        $letter->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('letter.show');
    }

    public function edit($id){
        $letter = Letter::with('area')->findOrFail($id);
        $areas = Area::get();
        //dd($tomo);
        return view('docus.letter.editletter',compact('letter','areas'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'letter_code' => 'required',
            'letter_name' => 'required|max:254',
            'letter_date' => 'required',
            'area_id' => 'required',
            'letter_document' => 'mimes:pdf|max:20240',
        ]);
        $letter = Letter::findOrFail($id);
        if ($request->hasFile('letter_document')) {
            if ($letter->letter_document != null) {
                Storage::disk('documents')->delete($letter->letter_document);
                $letter->letter_document = null;
            }
            $lettertomo = $request->file('letter_document')->store('letters','documents');
            $letter->letter_document = $lettertomo;
        }
        $letter->letter_code = $request->letter_code;
        $letter->letter_name = $request->letter_name;
        $letter->letter_date = $request->letter_date;
        $letter->area_id = $request->area_id;
        $letter->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('letter.show');

    }

    public function show(){
        $letters = Letter::with('area')->get();
        //dd($tomos); die();
        return view ('docus.letter.viewletter', compact('letters'));
    }

    public function destroy($id){
        $letter = Letter::findOrFail($id);
        Storage::disk('documents')->delete($letter->letter_document);
        $letter->delete();
        alert()->success('Carta Eliminada','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $letters = Letter::with('area')->orderBy('letter_code','Asc')->get();
        $fecha = Carbon::now();
        $cantidad = Letter::count();   
        $pdf = PDF::loadView('docus.letter.staticpdf', compact('letters','fecha','cantidad'));
        return $pdf->download('cartas.pdf');
    }

    public function allexcel(){
        return Excel::download(new LettersExport, 'cartas.xlsx');
    }

    public function report(){
        $areas = Area::get();
        return view('report.dynamic.documents.letter.data', compact('areas'));
    }

    public function query(Request $request){
        $consults = null;
        $letter_code = $request->letter_code;
        $area_id = $request->area_id;
        $date_min = $request->date_min;
        $date_max = $request->date_max;
        $letter_name = $request->letter_name;
        //dd($request->all()); die();
        $consults = Letter::select('*')->where(function ($query) use ($request){
            if ($request->letter_code != null) {
                $query->where('letter_code','LIKE','%'.$request->letter_code.'%');
            }
            if ($request->area_id != null) {
                $query->where('area_id','LIKE','%'.$request->area_id.'%');
            }
            if ($request->date_min != null && $request->date_max != null) {
                $query->whereBetween('letter_date', [$request->date_min, $request->date_max]);
            }
            if ($request->letter_name != null) {
                $query->where('letter_name','LIKE','%'.$request->letter_name.'%');
            }
        })->orderBy('letter_code', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.documents.letter.pdf', compact('consults','fecha','cantidad','letter_code','area_id','date_min','date_max','letter_name'));
        return $pdf->stream();

    }
}