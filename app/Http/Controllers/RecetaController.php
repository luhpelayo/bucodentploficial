<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Receta;
use App\Models\Consulta;
use App\Models\Paciente;
use PDF;
use Carbon\Carbon;
use App\Exports\RecetasExport;
use Maatwebsite\Excel\Facades\Excel;

class RecetaController extends Controller
{
    public function create(){
        $consultas = Consulta::get();
        return view ('receta.addReceta',compact('consultas'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'idconsulta' => 'required',
            'descripcion' => 'required',
        ]);
        //dd($request->all()); die();
            $receta = new Receta;
            $receta->descripcion = $request->descripcion;
            $receta->idconsulta = $request->idconsulta;
            $receta->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('receta.show');
    }

    public function edit($id){
        $receta = Receta::with('consulta')->findOrFail($id);
        $consultas = Consulta::get();
        //dd($tomo);
        return view('recetas.editReceta',compact('receta','consultas'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'consultaid' => 'required',
            'descripcion' => 'required',
        ]);
        //dd($request->all()); die();
        $receta = Receta::findOrFail($id);
        $receta->descripcion = $request->descripcion;
        $receta->consultaid = $request->matter_id;
        $receta->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('receta.show');
    }

    public function show(){
        $recetas = Receta::with('consulta')->get();
        //dd($tomos); die();
        return view ('recetas.viewReceta',compact('recetas'));
    }

    public function destroy($id){
        $receta = Receta::findOrFail($id);
        

        $receta->delete();
        alert()->success('Receta Eliminados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function addfiles($id){
        $visit = Visit::with('matter')->findOrFail($id);
        //dd($tomo);
        return view('visits.files',compact('visit'));
    }


    public function allpdf(){
        $recetas = Receta::with('consulta')->orderBy('descripcion','Asc')->get();
        $fecha = Carbon::now();
        $cantidad = Receta::count();   
        $pdf = PDF::loadView('recetas.staticpdf', compact('recetas','fecha','cantidad'));
        return $pdf->download('recetas.pdf');
    }

    public function allexcel(){
        return Excel::download(new RecetasExport, 'recetas.xlsx');
    }

    public function report()
    {
        $consultas = Consulta::get();
        return view('report.dynamic.receta.data', compact('consultas'));
    }

    public function query(Request $request){
        $consults = null;
        $descripcion = $request->descripcion;
        $consultaid = $request->consultaid;
        //dd($request->all()); die();
        $consults = Receta::select('*')->where(function ($query) use ($request){
            if ($request->descripcion != null) {
                $query->where('descripcion','LIKE','%'.$request->descripcion.'%');
            }
            if ($request->consultaid != null) {
                $query->where('consultaid','LIKE','%'.$request->consultaid.'%');
            }
      

        })->orderBy('descripcion', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.receta.pdf', compact('consults','fecha','cantidad','descripcion','consultaid','date_min','date_max'));
        return $pdf->stream();

    }
}
