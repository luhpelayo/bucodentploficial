<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Modality;
use PDF;
use Carbon\Carbon;
use App\Exports\ModalitiesExport;
use Maatwebsite\Excel\Facades\Excel;
class ModalityController extends Controller
{
    public function create(){
        return view ('graduated.modality.addModality');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'modality_name' => 'required|unique:modalities',
            'modality_description' => 'required|max:255',
        ]);

            $modality = new Modality;
            $modality->modality_name = $request->modality_name;
            $modality->modality_description = $request->modality_description;
            $modality->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('modality.show');
    }

    public function show(){
        $modalities = Modality::all();
        return view ('graduated.modality.viewModality', compact('modalities'));
    }

    public function edit($id){
        $modality = Modality::findOrFail($id);
        return view('graduated.modality.editModality',compact('modality'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'modality_name' => 'required',
            'modality_description' => 'required|max:255',
        ]);
        $modality = Modality::findOrFail($id);
        $modality->modality_name = $request->modality_name;
        $modality->modality_description = $request->modality_description;
        $modality->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('modality.show');
    }

    public function destroy($id){
        $modality = Modality::findOrFail($id);
        $modality->delete();
        alert()->success('Modalidad Eliminada','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $modalities = Modality::all();
        $fecha = Carbon::now();
        $cantidad = Modality::count();   
        $pdf = PDF::loadView('graduated.modality.staticpdf', compact('modalities','fecha','cantidad'));
        return $pdf->download('modalities.pdf');
    }

    public function allexcel(){
        return Excel::download(new ModalitiesExport, 'modalities.xlsx');
    }
}
