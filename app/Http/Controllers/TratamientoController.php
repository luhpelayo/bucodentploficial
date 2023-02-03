<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tratamiento;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\TratamientosExport;
use Maatwebsite\Excel\Facades\Excel;

class TratamientoController extends Controller
{
    public function create(){
        return view ('tratamiento.addTratamiento');
    }

    public function edit($id){
        $tratamiento = Tratamiento::findOrFail($id);
        return view('tratamiento.editTratamiento ',compact('tratamiento'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'nombre' => 'required',
            'color' => 'required',
            'precio' => 'required',
        ]);
     
        $tratamiento = Tratamiento::findOrFail($id);
        $tratamiento->nombre = $request->nombre;
        $tratamiento->color = $request->color;
        $tratamiento->precio = $request->precio;
        $tratamiento->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('tratamiento.show');

    }

    public function store(Request $request){
        $validated = $request->validate([
            'nombre' => 'required',
            'color' => 'required',
            'precio' => 'required',
        ]);
           
            
            $tratamiento = new Tratamiento;
            $tratamiento->nombre = $request->nombre;
            $tratamiento->color = $request->color;
            $tratamiento->precio = $request->precio;
            $tratamiento->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('tratamiento.show');
    }

    public function show(){
        $tratamientos = Tratamiento::all();
        return view ('tratamiento.viewTratamiento', compact('tratamientos'));
    }

    public function destroy($id){
        $tratamiento = Tratamiento::findOrFail($id);
      
        $tratamiento->delete();
        alert()->success('Tratamiento Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $tratamientos = Tratamiento::orderBy('nombre')->get();
        $fecha = Carbon::now();
        $cantidad = Tratamiento::count();   
        $pdf = PDF::loadView('tratamiento.staticpdf', compact('tratamientos','fecha','cantidad'));
        return $pdf->download('tratamientos.pdf');
    }

    public function allexcel(){
        return Excel::download(new TratamientosExport, 'tratamientos.xlsx');
    }

    //REPORTES
    public function report()
    {
        return view('report.dynamic.tratamiento.data');
    }

    public function query(Request $request)
    {
        $consults = null;
        
        $nombre = $request->nombre;
        $color = $request->color;
        $precio = $request->precio;
        $consults = Tratamiento::select('*')->where(function ($query) use ($request){
           
            if ($request->nombre != null) {
                $query->where('nombre','LIKE','%'.$request->nombre.'%');
            }
            if ($request->color != null) {
                $query->where('color','LIKE','%'.$request->color.'%');
            }
            if ($request->precio != null) {
                $query->where('precio','LIKE','%'.$request->precio.'%');
            }

        })->orderBy('nombre', 'ASC')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.tratamiento.pdf', compact('consults','fecha','cantidad','nombre','color','precio'));
        return $pdf->stream();
    }

}