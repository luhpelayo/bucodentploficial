<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Odontograma;
use App\Models\Tratamiento;
use App\Models\Diente;
use App\Models\Parte;
use App\Models\Archivo;
use App\Models\Consulta;
use App\Models\Servicio;

use App\Models\Fichaclinica;
use PDF;
use Carbon\Carbon;
use App\Exports\FichaclinicasExport;
use Maatwebsite\Excel\Facades\Excel;
class FichaclinicaController extends Controller
{
    public function create(){
        $archivos = Archivo::get();
        $consultas = Consulta::get();
      
        return view ('fichaclinica.addFichaclinica', compact('archivos','consultas'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'alergia' => 'required',
            'radiografia' => 'required',
            'alergia' => 'required',
            'archivoid3' => 'required',
            'consultaid3' => 'required',
           
       
        ]);
        //dd($request->all()); die();
        $fichaclinica = new Fichaclinica;
        $fichaclinica->alergia = $request->alergia;
        $fichaclinica->radiografia = $request->radiografia;
        $fichaclinica->idarchivo = $request->archivoid3;
        $fichaclinica->consultaid = $request->consultaid3;
        
        
        $fichaclinica->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('fichaclinica.show');

    }

    public function edit($id){
        $fichaclinica = Fichaclinica::findOrFail($id);
       
       
        $archivos = Archivo::get();
        $consultas = Consulta::get();
        //dd($servicios);
        //$archivos = Archivo::get();
        //$consultas = Consulta::get();
        //$odontogramas = Odontograma::get();
        //$servicios = Servicio::get();
        return view('fichaclinica.editFichaclinica',compact('fichaclinica','archivos','consultas'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'alergia' => 'required',
            'radiografia' => 'required',
            'alergia' => 'required',
            'archivoid3' => 'required',
            'consultaid3' => 'required',
          
        ]);
        //dd($request->all()); die();
        $fichaclinica = Fichaclinica::findOrFail($id);
        $fichaclinica->alergia = $request->alergia;
        $fichaclinica->radiografia = $request->radiografia;
        $fichaclinica->idarchivo = $request->archivoid3;
        $fichaclinica->consultaid = $request->consultaid3;
       
        $fichaclinica->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('fichaclinica.show');
    }

    public function show(){
        $fichaclinicas = Fichaclinica::all();
     
       //dd($fichaclinicas);
        return view ('fichaclinica.viewFichaclinica', compact('fichaclinicas'));
    }

    public function destroy($id){
        $fichaclinica = Fichaclinica::findOrFail($id);
        $fichaclinica->delete();
        alert()->success('Actividad Cultural Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }


    ///modificar
    public function allpdf(){
        $fichaclinicas = Fichaclinica::orderBy('fechahora')->get();
        $fecha = Carbon::now();
        $cantidad = Fichaclinica::count();   
        $pdf = PDF::loadView('fichaclinica.staticpdf', compact('fichaclinicas','fecha','cantidad'));
        return $pdf->download('fichaclinicas.pdf');
    }

    public function allexcel(){
        return Excel::download(new FichaclinicasExport, 'fichaclinicas.xlsx');
    }

    public function report()
    {
        $archivos = Archivo::get();
        $consultas = Consulta::get();
        $odontogramas = Odontograma::get();
        $servicios = Servicio::get();
        return view('report.dynamic.fichaclinica.data', compact('archivos','consultas','odontogramas','servicios'));
    }

    public function query(Request $request){
        $consults = null;
        $archivoid = $request->archivoid;
        $consultaid = $request->consultaid;
        
        $fechahora = $request->fechahora;
        //dd($request->all()); die();
        $consults = Fichaclinica::select('*')->where(function ($query) use ($request){
            if ($request->archivoid != null) {
                $query->where('archivoid','LIKE','%'.$request->archivoid.'%');
            }
            if ($request->consultaid != null) {
                $query->where('consultaid','LIKE','%'.$request->consultaid.'%');
            }
            if ($request->odontogramaid != null) {
                $query->where('odontogramaid','LIKE','%'.$request->odontogramaid.'%');
            }
            if ($request->servicioid != null) {
                $query->where('servicioid','LIKE','%'.$request->servicioid.'%');
            }
            if ($request->fechahora != null) {
                $query->where('fechahora','LIKE','%'.$request->fechahora.'%');
            }
           
        })->orderBy('fechahora', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Fichaclinica Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.fichaclinica.pdf', compact('consults','fecha','cantidad','archivoid','consultaid','odontogramaid','servicioid','fechahora'));
        return $pdf->stream();

    }
}
