<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fichaclinica;
use App\Models\Consulta;
use App\Models\Archivo;
use App\Models\Paciente;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\FichaclinicasExport;
use Maatwebsite\Excel\Facades\Excel;

class FichaclinicaController extends Controller
{
    public function create(){
        $archivos = Archivo::get();
        $pacientes = Paciente::get();
        return view ('fichaclinica.addFichaclinica',compact('archivos','pacientes'));
    }

    public function edit($id){
        $fichaclinica = Fichaclinica::with('archivo','paciente')->findOrFail($id);
        return view('fichaclinica.editFichaclinica',compact('fichaclinica','archivo','paciente'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'idarchivo' => 'required',
            'consultaid' => 'required',
            'alergia' => 'required|max:30',
            'radiografia' => 'required|max:30',
            
        ]);
        $fichaclinica = Fichaclinica::findOrFail($id);
        $fichaclinica->alergia = $request->alergia;
        $fichaclinica->radiografia = $request->radiografia;
        $fichaclinica->idarchivo = $request->idarchivo;
        $fichaclinica->consultaid = $request->consultaid;
        $fichaclinica->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('fichaclinica.show');

    }

    public function store(Request $request){
        $validated = $request->validate([
            'alergia' => 'required|max:30',
            'radiografia' => 'required|max:30',
            'idarchivo' => 'required',
            'consultaid' => 'required',
        ]);
       
        
            
            $fichaclinica = new Fichaclinica;
            $fichaclinica->alergia = $request->alergia;
            $fichaclinica->radiografia = $request->radiografia;
            $fichaclinica->idarchivo = $request->idarchivo;
            $fichaclinica->consultaid = $request->consultaid;
            $fichaclinica->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('fichaclinica.show');
    }

    public function show(){
        $fichaclinicas = Fichaclinica::with('archivo','consulta')->get();
        return view ('fichaclinica.viewFichaclinica', compact('fichaclinicas'));
    }

    public function destroy($id){
        $fichaclinica = Fichaclinica::findOrFail($id);
        if ($fichaclinica->paciente_image != null) {
            Storage::disk('images')->delete($fichaclinica->paciente_image);
        }
        $fichaclinica->delete();
        alert()->success('Ficha clinica Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $fichaclinicas = Fichaclinica::with('archivo','consulta')->orderBy('alergia')->get();
        $fecha = Carbon::now();
        $cantidad = Fichaclinica::count();   
        $pdf = PDF::loadView('fichaclinica.staticpdf', compact('fichaclinicas','fecha','cantidad'));
        return $pdf->download('fichaclinica.pdf');
    }

    public function allexcel(){
        return Excel::download(new FichaclinicasExport, 'fichaclinicas.xlsx');
    }

    //REPORTES
    public function report()
    {
        $archivos = Archivo::get();
        $consultas = Consulta::get();
        return view('report.dynamic.fichaclinica.data', compact('archivos','consultas'));
    }

    public function query(Request $request)
    {
        $consults = null;
        $alergia = $request->alergia;
        $radiografia = $request->radiografia;
        $idarchivo = $request->idarchivo;
        $consultaid = $request->consultaid;
        $consults = Fichaclinica::select('*')->where(function ($query) use ($request){
            if ($request->alergia != null) {
                $query->where('alergia','LIKE','%'.$request->alergia.'%');
            }
            if ($request->radiografia != null) {
                $query->where('radiografia','LIKE','%'.$request->radiografia.'%');
            }
            if ($request->idarchivo != null) {
                $query->where('idarchivo','LIKE','%'.$request->idarchivo.'%');
            }
            if ($request->consultaid != null) {
                $query->where('consultaid','LIKE','%'.$request->consultaid.'%');
            }
        })->orderBy('alergia', 'ASC')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.fichaclinica.pdf', compact('consults','fecha','cantidad','alergia','radiografia','idarchivo','consultaid'));
        return $pdf->stream();
    }
}
