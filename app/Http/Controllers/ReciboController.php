<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Recibo;
use App\Models\Consulta;
use App\Models\Paciente;
use PDF;
use Carbon\Carbon;
use App\Exports\RecibosExport;
use Maatwebsite\Excel\Facades\Excel;

class ReciboController extends Controller
{
    public function create(){
        $consultas = Consulta::get();
        return view ('recibo.addRecibo',compact('consultas'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'consultaid' => 'required',
            'ajc' => 'required',
            'credito' => 'required',
            'diente' => 'required',
            'fecha' => 'required',
            'saldo' => 'required',
            'tiempo' => 'required',
            'tratamiento' => 'required',
        ]);
        //dd($request->all()); die();
            $recibo = new Recibo;
            $recibo->ajc = $request->ajc;
            $recibo->credito = $request->credito;
            $recibo->diente = $request->diente;
            $recibo->fecha = $request->fecha;
            $recibo->saldo = $request->saldo;
            $recibo->tiempo = $request->tiempo;
            $recibo->tratamiento = $request->tratamiento;
            $recibo->consultaid = $request->consultaid;
            $recibo->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('recibo.show');
    }

    public function edit($id){
        $recibo = Recibo::with('consulta')->findOrFail($id);
        $consultas = Consulta::get();
        //dd($tomo);
        return view('recibos.editRecibo',compact('recibo','consultas'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
        'consultaid' => 'required',
        'ajc' => 'required',
        'credito' => 'required',
        'diente' => 'required',
        'fecha' => 'required',
        'saldo' => 'required',
        'tiempo' => 'required',
        'tratamiento' => 'required',
        ]);
        //dd($request->all()); die();
        $recbo = Recibo::findOrFail($id);
        $recibo->ajc = $request->ajc;
        $recibo->credito = $request->credito;
        $recibo->diente = $request->diente;
        $recibo->fecha = $request->fecha;
        $recibo->saldo = $request->saldo;
        $recibo->tiempo = $request->tiempo;
        $recibo->tratamiento = $request->tratamiento;
        $recibo->consultaid = $request->consultaid;
        $recibo->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('recibo.show');
    }

    public function show(){
        $recibos = Recibo::with('consulta')->get();
        //dd($tomos); die();
        return view ('recibos.viewRecibo',compact('recibos'));
    }

    public function destroy($id){
        $recibo = Recibo::findOrFail($id);
        

        $recibo->delete();
        alert()->success('Recibos Eliminados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    
    public function allpdf(){
        $recibos = Recibo::with('consulta')->orderBy('ajc','Asc')->get();
        $fecha = Carbon::now();
        $cantidad = Recibo::count();   
        $pdf = PDF::loadView('recibos.staticpdf', compact('recibos','fecha','cantidad'));
        return $pdf->download('recibos.pdf');
    }

    public function allexcel(){
        return Excel::download(new RecibosExport, 'recibos.xlsx');
    }

    public function report()
    {
        $consultas = Consulta::get();
        return view('report.dynamic.recibo.data', compact('consultas'));
    }

    public function query(Request $request){
        $consults = null;
        $ajc = $request->ajc;
        $consultaid = $request->consultaid;
        $credito = $request->credito;
        $diente = $request->diente;
        $fecha = $request->fecha;
        $saldo = $request->saldo;
        $tiempo = $request->tiempo;
        $tratamiento = $request->tratamiento;

        //dd($request->all()); die();
        $consults = Visit::select('*')->where(function ($query) use ($request){
            if ($request->ajc != null) {
                $query->where('ajc','LIKE','%'.$request->ajc.'%');
            }
            if ($request->consultaid != null) {
                $query->where('consultaid','LIKE','%'.$request->consultaid.'%');
            }
            if ($request->credito != null) {
                $query->where('credito','LIKE','%'.$request->credito.'%');
            }
            if ($request->diente != null) {
                $query->where('diente','LIKE','%'.$request->diente.'%');
            }
            if ($request->fecha != null) {
                $query->where('fecha','LIKE','%'.$request->fecha.'%');
            }
            if ($request->saldo != null) {
                $query->where('saldo','LIKE','%'.$request->saldo.'%');
            }
            if ($request->tiempo != null) {
                $query->where('tiempo','LIKE','%'.$request->tiempo.'%');
            }
            if ($request->tratamiento != null) {
                $query->where('tratamiento','LIKE','%'.$request->tratamiento.'%');
            }
        })->orderBy('ajc', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.recibo.pdf', compact('consults','fecha','cantidad','ajc','consultaid','credito','diente','fecha','saldo','tiempo','tratamiento'));
        return $pdf->stream();

    }
}
