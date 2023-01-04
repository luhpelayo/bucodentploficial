<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Odontologo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\OdontologosExport;
use Maatwebsite\Excel\Facades\Excel;

class OdontologoController extends Controller
{
    public function create(){
        return view ('odontologo.addOdontologo');
    }

    public function edit($id){
        $odontologo = Odontologo::findOrFail($id);
        return view('odontologo.editOdontologo',compact('odontologo'));
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
            'especialidad' => 'required|max:30',
            'ruc' => 'required|max:30',
        ]);
        $odontologo = Odontologo::findOrFail($request->id);
        $odontologo->nombre = $request->nombre;
        $odontologo->apellido = $request->apellido;
        $odontologo->ci = $request->ci;
        $odontologo->fechanacimiento = $request->fechanacimiento;
        $odontologo->direccion = $request->direccion;
        $odontologo->telefono = $request->telefono;
        $odontologo->email = $request->email;
        $odontologo->especialidad = $request->especialidad;
        $odontologo->ruc = $request->ruc;
        $odontologo->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('odontologo.show');

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
            'especialidad' => 'required|max:30',
            'ruc' => 'required|max:30',
        ]);
       
        
            
            $odontologo = new Odontologo;
            $odontologo->nombre = $request->nombre;
            $odontologo->apellido = $request->apellido;
            $odontologo->ci = $request->ci;
            $odontologo->fechanacimiento = $request->fechanacimiento;
            $odontologo->direccion = $request->direccion;
            $odontologo->telefono = $request->telefono;
            $odontologo->email = $request->email;
            $odontologo->especialidad = $request->especialidad;
            $odontologo->ruc = $request->ruc;
            $odontologo->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('odontologo.show');
    }

    public function show(){
        $odontologos = Odontologo::all();
        return view ('odontologo.viewOdontologo', compact('odontologos'));
    }

    

    public function destroy($id){
        $odontologo = Odontologo::findOrFail($id);
        if ($odontologo->odontologo_image != null) {
            Storage::disk('images')->delete($odontologo->paciente_image);
        }
        $odontologo->delete();
        alert()->success('Odontologo Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $odontologos = Odontologo::orderBy('nombre')->get();
        $fecha = Carbon::now();
        $cantidad = Odontologo::count();   
        $pdf = PDF::loadView('odontologo.staticpdf', compact('odontologos','fecha','cantidad'));
        return $pdf->download('odontologo.pdf');
    }

    public function allexcel(){
        return Excel::download(new OdontologosExport, 'odontologos.xlsx');
    }

    //REPORTES
    public function report()
    {
        return view('report.dynamic.odontologo.data');
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
        $especialidad = $request->especialidad;
        $ruc = $request->ruc;
        $consults = Odontologo::select('*')->where(function ($query) use ($request){
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
            if ($request->especialidad != null) {
                $query->where('especialidad','LIKE','%'.$request->especialidad.'%');
            }
            if ($request->ruc != null) {
                $query->where('ruc','LIKE','%'.$request->ruc.'%');
            }

        })->orderBy('nombre', 'ASC')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.odontologo.pdf', compact('consults','fecha','cantidad','nombre','apellido','ci','direccion','telefono','email','especialidad','ruc'));
        return $pdf->stream();
    }
}
