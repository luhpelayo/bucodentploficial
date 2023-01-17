<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Odontograma;
use App\Models\Tratamiento;
use App\Models\Diente;
use App\Models\Parte;
use PDF;
use Carbon\Carbon;
use App\Exports\OdontogramasExport;
use Maatwebsite\Excel\Facades\Excel;
class OdontogramaController extends Controller
{
    public function create(){
        $tratamientos = Tratamiento::get();
        $dientes = Diente::get();
        $partes = Parte::get();
        return view ('odontograma.addOdontograma', compact('tratamientos','dientes','partes'));
    }

    
    public function store(Request $request){
        $validated = $request->validate([
            'diagnostico' => 'required',
            'fechainicio' => 'required',
            'fechafin' => 'required',
        
        ]);
        //dd($request->all()); die();
        $odontograma = new Odontograma;
        $odontograma->diagnostico = $request->diagnostico;
        $odontograma->fechainicio = $request->fechainicio;
        $odontograma->fechafin = $request->fechafin;
       // $odontograma->tratamientoid = $request->tratamientoid3;
       // $odontograma->dienteid = $request->dienteid3;
       // $odontograma->parteid = $request->parteid3;
        $odontograma->tratamientoid = 1;
       $odontograma->dienteid = 1;
       $odontograma->parteid = 1;
        $odontograma->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('odontograma.show');

    }

    public function edit($id){
        $odontograma = Odontograma::findOrFail($id);
        $tratamientos = Tratamiento::get();
        $dientes = Diente::get();
        $partes = Parte::get();
        return view('odontograma.editOdontograma',compact('odontograma','tratamientos','dientes','partes'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'diagnostico' => 'required',
            'fechainicio' => 'required',
            'fechafin' => 'required',
           
        ]);
        //dd($request->all()); die();
        $odontograma = Odontograma::findOrFail($id);
        $odontograma->diagnostico = $request->diagnostico;
        $odontograma->fechainicio = $request->fechainicio;
        $odontograma->fechafin = $request->fechafin;
        $odontograma->tratamientoid = 1;
       $odontograma->dienteid = 1;
       $odontograma->parteid = 1;
        $odontograma->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('odontograma.show');
    }

    public function show(){
        $odontogramas = Odontograma::all();
       // dd($odontogramas);
        return view ('odontograma.viewOdontograma', compact('odontogramas'));
    }

    public function destroy($id){
        $odontograma = Odontograma::findOrFail($id);
        $odontograma->delete();
        alert()->success('Actividad Cultural Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }


    ///modificar
    public function allpdf(){
        $odontogramas = Odontograma::orderBy('fechainicio')->get();
        $fecha = Carbon::now();
        $cantidad = Odontograma::count();   
        $pdf = PDF::loadView('odontograma.staticpdf', compact('odontogramas','fecha','cantidad'));
        return $pdf->download('odontogramas.pdf');
    }

    public function allexcel(){
        return Excel::download(new OdontogramasExport, 'odontogramas.xlsx');
    }

    public function report()
    {
        $tratamientos = Tratamiento::get();
        $dientes = Diente::get();
        $partes = Parte::get();
        return view('report.dynamic.odontograma.data', compact('tratamientos','dientes','partes'));
    }

    public function query(Request $request){
        $consults = null;
        $tratamientoid = $request->tratamientoid;
        $parteid = $request->parteid;
        $dienteid = $request->dienteid;
        $diagnostico = $request->diagnostico;
        $fechainicio = $request->fechainicio;
        $fechafin = $request->fechafin;
        //dd($request->all()); die();
        $consults = Odontograma::select('*')->where(function ($query) use ($request){
            if ($request->tratamientoid != null) {
                $query->where('tratamientoid','LIKE','%'.$request->tratamientoid.'%');
            }
            if ($request->parteid != null) {
                $query->where('parteid','LIKE','%'.$request->parteid.'%');
            }
            if ($request->dienteid != null) {
                $query->where('dienteid','LIKE','%'.$request->dienteid.'%');
            }
            if ($request->diagnostico != null) {
                $query->where('diagnostico','LIKE','%'.$request->diagnostico.'%');
            }
            if ($request->fechainicio != null) {
                $query->where('fechainicio','LIKE','%'.$request->fechainicio.'%');
            }
            if ($request->fechafin != null) {
                $query->where('fechafin','LIKE','%'.$request->fechafin.'%');
            }
        })->orderBy('fechainicio', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.odontograma.pdf', compact('consults','fecha','cantidad','tratamientoid','parteid','dienteid','diagnostico','fechainicio', 'fechafin'));
        return $pdf->stream();

    }
}
