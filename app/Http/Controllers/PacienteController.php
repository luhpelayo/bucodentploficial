<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\PacientesExport;
use Maatwebsite\Excel\Facades\Excel;

class PacienteController extends Controller
{
    public function create(){
        return view ('paciente.addPaciente');
    }

    public function edit($id){
        $paciente = Paciente::findOrFail($id);
        return view('paciente.editPaciente',compact('paciente'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'nombre' => 'required|max:30',
            'apellido' => 'required|max:30',
            'ci' => 'required',
            'fechanacimiento' => 'required|max:30',
            'direccion' => 'required|max:30',
            'telefono' => 'required',
            'email' => 'required|max:30',
        ]);
        $paciente = Paciente::findOrFail($request->id);
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->ci = $request->ci;
        $paciente->fechanacimiento = $request->fechanacimiento;
        $paciente->direccion = $request->direccion;
        $paciente->telefono = $request->telefono;
        $paciente->email = $request->email;
        $paciente->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('paciente.show');

    }

    public function store(Request $request){
        $validated = $request->validate([
            'nombre' => 'required|max:30',
            'apellido' => 'required|max:30',
            'ci' => 'required',
            'fechanacimiento' => 'required|max:30',
            'direccion' => 'required|max:30',
            'telefono' => 'required',
            'email' => 'required|max:30',
        ]);
       
        
            
            $paciente = new Paciente;
            $paciente->nombre = $request->nombre;
            $paciente->apellido = $request->apellido;
            $paciente->ci = $request->ci;
            $paciente->fechanacimiento = $request->fechanacimiento;
            $paciente->direccion = $request->direccion;
            $paciente->telefono = $request->telefono;
            $paciente->email = $request->email;
            $paciente->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('paciente.show');
    }

    public function show(){
        $pacientes = Paciente::all();
        return view ('paciente.viewPaciente', compact('pacientes'));
    }

    public function destroy($id){
        $paciente = Paciente::findOrFail($id);
        if ($paciente->paciente_image != null) {
            Storage::disk('images')->delete($paciente->paciente_image);
        }
        $paciente->delete();
        alert()->success('Paciente Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $pacientes = Paciente::orderBy('nombre')->get();
        $fecha = Carbon::now();
        $cantidad = Paciente::count();   
        $pdf = PDF::loadView('paciente.staticpdf', compact('pacientes','fecha','cantidad'));
        return $pdf->download('paciente.pdf');
    }

    public function allexcel(){
        return Excel::download(new PacientesExport, 'pacientes.xlsx');
    }

    //REPORTES
    public function report()
    {
        return view('report.dynamic.paciente.data');
    }

    public function query(Request $request)
    {
        $consults = null;
        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $ci = $request->ci;
        $fechanacimiento = $request->fechanacimiento;
        $direccion = $request->direccion;
        $telefono = $request->telefono;
        $email = $request->email;
        $consults = Paciente::select('*')->where(function ($query) use ($request){
            if ($request->nombre != null) {
                $query->where('nombre','LIKE','%'.$request->nombre.'%');
            }
            if ($request->apellido != null) {
                $query->where('apellido','LIKE','%'.$request->apellido.'%');
            }
            if ($request->ci != null) {
                $query->where('ci','LIKE','%'.$request->ci.'%');
            }
            if ($request->fechanacimiento != null) {
                $query->where('fechanacimiento','LIKE','%'.$request->ci.'%');
            }
            if ($request->direccion != null) {
                $query->where('direccion','LIKE','%'.$request->direccion.'%');
            }
            if ($request->telefono != null) {
                $query->where('telefono','LIKE','%'.$request->telefono.'%');
            }
            if ($request->email != null) {
                $query->where('email','LIKE','%'.$request->email.'%');
            }

        })->orderBy('nombre', 'ASC')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.paciente.pdf', compact('consults','fecha','cantidad','nombre','apellido','ci','direccion','telefono','email'));
        return $pdf->stream();
    }
}
