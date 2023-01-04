<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\ServiciosExport;
use Maatwebsite\Excel\Facades\Excel;

class ServicioController extends Controller
{
    public function create(){
        return view ('servicio.addServicio');
    }

    public function edit($id){
        $servicio = Servicio::findOrFail($id);
        return view('servicio.editServicio',compact('servicio'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'nombre' => 'required|max:30',
            'descripcion' => 'required|max:30',
            'precio' => 'required',
        ]);
        $servicio = Servicio::findOrFail($request->id);
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->precio = $request->precio;
        $servicio->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('servicio.show');

    }

    public function store(Request $request){
        $validated = $request->validate([
            'nombre' => 'required|max:30',
            'descripcion' => 'required|max:30',
            'precio' => 'required',
        ]);
       
        
            
            $servicio = new Servicio;
            $servicio->nombre = $request->nombre;
            $servicio->descripcion = $request->descripcion;
            $servicio->precio = $request->precio;
            $servicio->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('servicio.show');
    }

    public function show(){
        $servicios = Servicio::all();
        return view ('servicio.viewServicio', compact('servicios'));
    }

    public function destroy($id){
        $servicio = Servicio::findOrFail($id);
        if ($servicio->paciente_image != null) {
            Storage::disk('images')->delete($servicio->paciente_image);
        }
        $servicio->delete();
        alert()->success('Servicio Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $servicios = Servicio::orderBy('nombre')->get();
        $fecha = Carbon::now();
        $cantidad = Servicio::count();   
        $pdf = PDF::loadView('servicio.staticpdf', compact('servicios','fecha','cantidad'));
        return $pdf->download('servicio.pdf');
    }

    public function allexcel(){
        return Excel::download(new ServiciosExport, 'servicios.xlsx');
    }

    //REPORTES
    public function report()
    {
        return view('report.dynamic.servicio.data');
    }

    public function query(Request $request)
    {
        $consults = null;
        $nombre = $request->nombre;
        $descripcion = $request->descripcion;
        $precio = $request->precio;
        $consults = Servicio::select('*')->where(function ($query) use ($request){
            if ($request->nombre != null) {
                $query->where('nombre','LIKE','%'.$request->nombre.'%');
            }
            if ($request->descripcion != null) {
                $query->where('descripcion','LIKE','%'.$request->descripcion.'%');
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
        $pdf = PDF::loadView('report.dynamic.servicio.pdf', compact('consults','fecha','cantidad','nombre','descripcion','precio'));
        return $pdf->stream();
    }
}
