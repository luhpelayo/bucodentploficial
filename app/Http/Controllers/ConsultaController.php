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
use PDF;
use Carbon\Carbon;
use App\Exports\ConsultasExport;
use Maatwebsite\Excel\Facades\Excel;
class ConsultaController extends Controller
{
    public function create(){
        $pacientes = Paciente::get();
        $odontologos = Odontologo::get();
        $odontogramas = Odontograma::get();
        $servicios = Servicio::get();
        return view ('consulta.addConsulta', compact('pacientes','odontologos','odontogramas','servicios'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'fechahora' => 'required',
            'pacienteid3' => 'required',
            'odontologoid3' => 'required',
           
            'servicioid3' => 'required',
        ]);
        //dd($request->all()); die();
        $consulta = new Consulta;
        $consulta->fechahora = $request->fechahora;
        $consulta->pacienteid = $request->pacienteid3;
        $consulta->odontologoid = $request->odontologoid3;
        $consulta->odontogramaid = 1;
        $consulta->servicioid = $request->servicioid3;
        $consulta->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('consulta.show');

    }

    public function edit($id){
        $consulta = Consulta::findOrFail($id);
       
        $pacientesid= DB::table('consultas')->where('id', $id)->value('pacienteid');
        $pacientesnombre= DB::table('pacientes')->where('id', $pacientesid)->value('nombre');
        $pacientesapellido= DB::table('pacientes')->where('id', $pacientesid)->value('apellido');
        $pacientes=$pacientesapellido." ".$pacientesnombre;
        
        $odontologosid= DB::table('consultas')->where('id', $id)->value('odontologoid');
        $odontologosnombre= DB::table('odontologos')->where('id', $odontologosid)->value('nombre');
        $odontologosapellido= DB::table('odontologos')->where('id', $odontologosid)->value('apellido');
        $odontologos=$odontologosapellido." ".$odontologosnombre;

        $serviciosid= DB::table('consultas')->where('id', $id)->value('servicioid');
        $servicios= DB::table('servicios')->where('id', $serviciosid)->value('nombre');
        //dd($servicios);
        //$pacientes = Paciente::get();
        //$odontologos = Odontologo::get();
        $odontogramas = Odontograma::get();
        //$servicios = Servicio::get();
        return view('consulta.editConsulta',compact('consulta','pacientes','odontologos','odontogramas','servicios'));
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
        $consulta = Consulta::findOrFail($id);
        $consulta->fechahora = $request->fechahora;
        $consulta->pacienteid = $request->pacienteid3;
        $consulta->odontologoid = $request->odontologoid3;
        $consulta->odontogramaid = $request->odontogramaid3;
        $consulta->servicioid = $request->servicioid3;
        $consulta->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('consulta.show');
    }

    public function show(){
        $consultas = Consulta::all();
     
       //dd($consultas);
        return view ('consulta.viewConsulta', compact('consultas'));
    }

    public function destroy($id){
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();
        alert()->success('Actividad Cultural Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }


    ///modificar
    public function allpdf(){
        $consultas = Consulta::orderBy('fechahora')->get();
        $fecha = Carbon::now();
        $cantidad = Consulta::count();   
        $pdf = PDF::loadView('consulta.staticpdf', compact('consultas','fecha','cantidad'));
        return $pdf->download('consultas.pdf');
    }

    public function allexcel(){
        return Excel::download(new ConsultasExport, 'consultas.xlsx');
    }

    public function report()
    {
        $pacientes = Paciente::get();
        $odontologos = Odontologo::get();
        $odontogramas = Odontograma::get();
        $servicios = Servicio::get();
        return view('report.dynamic.consulta.data', compact('pacientes','odontologos','odontogramas','servicios'));
    }

    public function query(Request $request){
        $consults = null;
        $pacienteid = $request->pacienteid;
        $odontologoid = $request->odontologoid;
        $odontogramaid = $request->odontogramaid;
        $servicioid = $request->servicioid;
        $fechahora = $request->fechahora;
        //dd($request->all()); die();
        $consults = Consulta::select('*')->where(function ($query) use ($request){
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
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.consulta.pdf', compact('consults','fecha','cantidad','pacienteid','odontologoid','odontogramaid','servicioid','fechahora'));
        return $pdf->stream();

    }
}
