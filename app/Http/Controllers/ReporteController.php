<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Odontograma;
use App\Models\Tratamiento;
use App\Models\Diente;
use App\Models\Parte;
use App\Models\Paciente;
use App\Models\Odontologo;
use App\Models\Servicio;
use App\Models\Consulta;
use App\Models\Reporte;

use PDF;
use Carbon\Carbon;
use App\Exports\ConsultasExport;
use Maatwebsite\Excel\Facades\Excel;
class ReporteController extends Controller
{
  
    public function create(){
        $recibido_count = Consulta::where('servicioid',1)->get()->count();

        $derivado_count = Consulta::where('servicioid',2)->get()->count();
         
        $terminado_count = Consulta::where('servicioid',4)->get()->count();
        $noterminado_count = Consulta::where('servicioid',5)->get()->count();
        $verificado_count = Consulta::where('servicioid',7)->get()->count();

        
        return view ('reporte.addReporte', compact('recibido_count','derivado_count','noterminado_count','terminado_count','verificado_count'));
    }
    public function store(Request $request){
        $validated = $request->validate([
            'fechahora' => 'required',
            'pacienteid3' => 'required',
            'odontologoid3' => 'required',
           
            'servicioid3' => 'required',
        ]);
        //dd($request->all()); die();
        $reporte = new Reporte;
        $reporte->fechahora = $request->fechahora;
        $reporte->pacienteid = $request->pacienteid3;
        $reporte->odontologoid = $request->odontologoid3;
        $reporte->odontogramaid = 1;
        $reporte->servicioid = $request->servicioid3;
        $reporte->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('reporte.show');

    }

    public function edit($id){
        $reporte = Reporte::findOrFail($id);
       
        $pacientesid= DB::table('reportes')->where('id', $id)->value('pacienteid');
        $pacientesnombre= DB::table('pacientes')->where('id', $pacientesid)->value('nombre');
        $pacientesapellido= DB::table('pacientes')->where('id', $pacientesid)->value('apellido');
        $pacientes=$pacientesapellido." ".$pacientesnombre;
        
        $odontologosid= DB::table('reportes')->where('id', $id)->value('odontologoid');
        $odontologosnombre= DB::table('odontologos')->where('id', $odontologosid)->value('nombre');
        $odontologosapellido= DB::table('odontologos')->where('id', $odontologosid)->value('apellido');
        $odontologos=$odontologosapellido." ".$odontologosnombre;

        $serviciosid= DB::table('reportes')->where('id', $id)->value('servicioid');
        $servicios= DB::table('servicios')->where('id', $serviciosid)->value('nombre');
        //dd($servicios);
        //$pacientes = Paciente::get();
        //$odontologos = Odontologo::get();
        $odontogramas = Odontograma::get();
        //$servicios = Servicio::get();
        return view('reporte.editReporte',compact('reporte','pacientes','odontologos','odontogramas','servicios'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'fechahora' => 'required',
            'pacienteid3' => 'required',
            'odontologoid3' => 'required',
            'odontogramaid3' => 'required',
            'servicioid3' => 'required',
        ]);
        //dd($request->all()); die();
        $reporte = Reporte::findOrFail($id);
        $reporte->fechahora = $request->fechahora;
        $reporte->pacienteid = $request->pacienteid3;
        $reporte->odontologoid = $request->odontologoid3;
        $reporte->odontogramaid = $request->odontogramaid3;
        $reporte->servicioid = $request->servicioid3;
        $reporte->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('reporte.show');
    }

    public function show(){
        $recibido_count = Consulta::where('servicioid',2)->get()->count();

        $derivado_count = Consulta::where('servicioid',3)->get()->count();
         
        $terminado_count = Consulta::where('servicioid',4)->get()->count();
        $noterminado_count = Consulta::where('servicioid',5)->get()->count();
        $verificado_count = Consulta::where('servicioid',6)->get()->count();

        
        return view ('reporte.viewReporte', compact('recibido_count','derivado_count','noterminado_count','terminado_count','verificado_count'));
    }
     
      

    public function destroy($id){
        $reporte = Reporte::findOrFail($id);
        $reporte->delete();
        alert()->success('Actividad Cultural Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }


    ///modificar
    public function allpdf(){
        $reportes = Reporte::orderBy('fechahora')->get();
        $fecha = Carbon::now();
        $cantidad = Reporte::count();   
        $pdf = PDF::loadView('reporte.staticpdf', compact('reportes','fecha','cantidad'));
        return $pdf->download('reportes.pdf');
    }

    public function allexcel(){
        return Excel::download(new ReportesExport, 'reportes.xlsx');
    }

    public function report()
    {
        $pacientes = Paciente::get();
        $odontologos = Odontologo::get();
        $odontogramas = Odontograma::get();
        $servicios = Servicio::get();
        return view('report.dynamic.reporte.data', compact('pacientes','odontologos','odontogramas','servicios'));
    }

    public function query(Request $request){
        $consults = null;
        $pacienteid = $request->pacienteid;
        $odontologoid = $request->odontologoid;
        $odontogramaid = $request->odontogramaid;
        $servicioid = $request->servicioid;
        $fechahora = $request->fechahora;
        //dd($request->all()); die();
        $consults = Reporte::select('*')->where(function ($query) use ($request){
            if ($request->pacienteid != null) {
                $query->where('pacienteid','LIKE','%'.$request->pacienteid.'%');
            }
            if ($request->odontologoid != null) {
                $query->where('odontologoid','LIKE','%'.$request->odontologoid.'%');
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
            alert()->error('Reporte Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.reporte.pdf', compact('consults','fecha','cantidad','pacienteid','odontologoid','odontogramaid','servicioid','fechahora'));
        return $pdf->stream();

    }
}