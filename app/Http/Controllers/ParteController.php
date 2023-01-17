<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parte;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\PartesExport;
use Maatwebsite\Excel\Facades\Excel;

class ParteController extends Controller
{
    public function create(){
        return view ('parte.addParte');
    }

    public function edit($id){
        $parte = Parte::findOrFail($id);
        return view('parte.editParte ',compact('parte'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'numeroparte' => ['required', 'integer', 'between:1,3'],
            'nombre' => 'required|max:30',
            'estado' => ['required', 'digits:1'],
            
        ]);
        $parte = Parte::findOrFail($id);
        $parte->numeroparte = $request->numeroparte;
        $parte->nombre = $request->nombre;
        $parte->estado = $request->estado;
        $parte->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('parte.show');

    }

    public function store(Request $request){
        $validated = $request->validate([
            'numeroparte' => ['required', 'integer', 'between:1,3'],
            'nombre' => 'required|max:30',
            'estado' => ['required', 'digits:1'],
            
        ]);
           
            
            $parte = new Parte;
            $parte->numeroparte = $request->numeroparte;
            $parte->nombre = $request->nombre;
            $parte->estado = $request->estado;
            $parte->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('parte.show');
    }

    public function show(){
        $partes = Parte::all();
        return view ('parte.viewParte', compact('partes'));
    }

    public function destroy($id){
        $parte = Parte::findOrFail($id);
      
        $parte->delete();
        alert()->success('Parte Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $partes = Parte::orderBy('numeroparte')->get();
        $fecha = Carbon::now();
        $cantidad = Parte::count();   
        $pdf = PDF::loadView('parte.staticpdf', compact('partes','fecha','cantidad'));
        return $pdf->download('partes.pdf');
    }

    public function allexcel(){
        return Excel::download(new PartesExport, 'partes.xlsx');
    }

    //REPORTES
    public function report()
    {
        return view('report.dynamic.parte.data');
    }

    public function query(Request $request)
    {
        $consults = null;
        $numeroparte = $request->numeroparte;
        $nombre = $request->nombre;
        $estado = $request->estado;
        $consults = Parte::select('*')->where(function ($query) use ($request){
            if ($request->numeroparte != null) {
                $query->where('numeroparte','LIKE','%'.$request->numeroparte.'%');
            }
            if ($request->nombre != null) {
                $query->where('nombre','LIKE','%'.$request->nombre.'%');
            }
            if ($request->estado != null) {
                $query->where('estado','LIKE','%'.$request->estado.'%');
            }

        })->orderBy('numeroparte', 'ASC')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.parte.pdf', compact('consults','fecha','cantidad','numeroparte','nombre','estado'));
        return $pdf->stream();
    }

}