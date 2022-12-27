<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Area;
use PDF;
use Carbon\Carbon;
use App\Exports\AreasExport;
use Maatwebsite\Excel\Facades\Excel;

class AreaController extends Controller
{
    public function create(){
        return view ('docus.area.addarea');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'area_name' => 'required|unique:areas',
            'area_description' => 'required|max:254',
        ]);
            $area = new Area;
            $area->area_name = $request->area_name;
            $area->area_description = $request->area_description;
            $area->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('area.show');
    }

    public function show(){
        $areas = Area::all();
        return view ('docus.area.viewarea', compact('areas'));
    }

    public function edit($id){
        $area = Area::findOrFail($id);
        return view('docus.area.editarea',compact('area'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'area_name' => 'required',
            'area_description' => 'required|max:255',
        ]);
        $area = Area::findOrFail($id);
        $area->area_name = $request->area_name;
        $area->area_description = $request->area_description;
        $area->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('area.show');
    }

    public function destroy($id){
        $area = Area::findOrFail($id);
        $area->delete();
        alert()->success('Área Eliminada','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $areas = Area::all();
        $fecha = Carbon::now();
        $cantidad = Area::count();   
        $pdf = PDF::loadView('docus.area.staticpdf', compact('areas','fecha','cantidad'));
        return $pdf->download('areas.pdf');
    }

    public function allexcel(){
        return Excel::download(new AreasExport, 'areas.xlsx');
    }
}
