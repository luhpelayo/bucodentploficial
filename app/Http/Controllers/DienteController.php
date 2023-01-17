<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diente;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\DientesExport;
use Maatwebsite\Excel\Facades\Excel;

class DienteController extends Controller
{
    public function create(){
        return view ('diente.addDiente');
    }

    public function edit($id){
        $diente = Diente::findOrFail($id);
        return view('diente.editDiente',compact('diente'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'numerodiente' => ['required', 'integer', 'between:1,100'],
            'nombre' => 'required|max:30',
            'estado' => ['required', 'digits:1'],
            
        ]);
        $diente = Diente::findOrFail($id);
        $diente->numerodiente = $request->numerodiente;
        $diente->nombre = $request->nombre;
        $diente->estado = $request->estado;
        $diente->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('diente.show');

    }

    public function store(Request $request){
        $validated = $request->validate([
            'numerodiente' => ['required', 'integer', 'between:1,100'],
            'nombre' => 'required|max:30',
            'estado' => ['required', 'digits:1'],
            
        ]);
           
            
            $diente = new Diente;
            $diente->numerodiente = $request->numerodiente;
            $diente->nombre = $request->nombre;
            $diente->estado = $request->estado;
            $diente->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('diente.show');
    }

    public function show(){
        $dientes = Diente::all();
        return view ('diente.viewDiente', compact('dientes'));
    }

    public function destroy($id){
        $diente = Diente::findOrFail($id);
      
        $diente->delete();
        alert()->success('Diente Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $dientes = Diente::orderBy('numerodiente')->get();
        $fecha = Carbon::now();
        $cantidad = Diente::count();   
        $pdf = PDF::loadView('diente.staticpdf', compact('dientes','fecha','cantidad'));
        return $pdf->download('dientes.pdf');
    }

    public function allexcel(){
        return Excel::download(new DientesExport, 'dientes.xlsx');
    }

    //REPORTES
    public function report()
    {
        return view('report.dynamic.diente.data');
    }

    public function query(Request $request)
    {
        $consults = null;
        $numerodiente = $request->numerodiente;
        $nombre = $request->nombre;
        $estado = $request->estado;
        $consults = Diente::select('*')->where(function ($query) use ($request){
            if ($request->numerodiente != null) {
                $query->where('numerodiente','LIKE','%'.$request->numerodiente.'%');
            }
            if ($request->nombre != null) {
                $query->where('nombre','LIKE','%'.$request->nombre.'%');
            }
            if ($request->estado != null) {
                $query->where('estado','LIKE','%'.$request->estado.'%');
            }

        })->orderBy('numerodiente', 'ASC')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.diente.pdf', compact('consults','fecha','cantidad','numerodiente','nombre','estado'));
        return $pdf->stream();
    }

}