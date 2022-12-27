<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\instruction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\InstructionsExport;
use Maatwebsite\Excel\Facades\Excel;
class InstructionController extends Controller
{
    public function create(){
        $areas = Area::get();
        return view ('docus.instruction.addinstruction', compact('areas'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'instruction_code' => 'required|unique:instructions',
            'instruction_name' => 'required|max:254',
            'instruction_date' => 'required',
            'area_id' => 'required',
            'instruction_document' => 'required|mimes:pdf|max:20240',
        ]);
        if ($request->hasFile('instruction_document')) {
            $instructiontomo = $request->file('instruction_document')->store('instructions','documents');
            $request->instruction_document = $instructiontomo;
        }
        //dd($request->all()); die();
        $instruction = new Instruction;
        $instruction->instruction_code = $request->instruction_code;
        $instruction->instruction_name = $request->instruction_name;
        $instruction->instruction_date = $request->instruction_date;
        $instruction->instruction_document = $request->instruction_document;
        $instruction->area_id = $request->area_id;
        $instruction->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('instruction.show');
    }

    public function edit($id){
        $instruction = Instruction::with('area')->findOrFail($id);
        $areas = Area::get();
        //dd($tomo);
        return view('docus.instruction.editinstruction',compact('instruction','areas'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'instruction_code' => 'required',
            'instruction_name' => 'required|max:254',
            'instruction_date' => 'required',
            'area_id' => 'required',
            'instruction_document' => 'mimes:pdf|max:20240',
        ]);
        $instruction = Instruction::findOrFail($id);
        if ($request->hasFile('instruction_document')) {
            if ($instruction->instruction_document != null) {
                Storage::disk('documents')->delete($instruction->instruction_document);
                $instruction->instruction_document = null;
            }
            $instructiontomo = $request->file('instruction_document')->store('instructions','documents');
            $instruction->instruction_document = $instructiontomo;
        }
        $instruction->instruction_code = $request->instruction_code;
        $instruction->instruction_name = $request->instruction_name;
        $instruction->instruction_date = $request->instruction_date;
        $instruction->area_id = $request->area_id;
        $instruction->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('instruction.show');

    }

    public function show(){
        $instructions = Instruction::with('area')->get();
        //dd($tomos); die();
        return view ('docus.instruction.viewinstruction', compact('instructions'));
    }

    public function destroy($id){
        $instruction = Instruction::findOrFail($id);
        Storage::disk('documents')->delete($instruction->instruction_document);
        $instruction->delete();
        alert()->success('Instructivo Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $instructions = Instruction::with('area')->orderBy('instruction_code','Asc')->get();
        $fecha = Carbon::now();
        $cantidad = Instruction::count();   
        $pdf = PDF::loadView('docus.instruction.staticpdf', compact('instructions','fecha','cantidad'));
        return $pdf->download('instructivos.pdf');
    }

    public function allexcel(){
        return Excel::download(new InstructionsExport, 'instructivos.xlsx');
    }

    public function report(){
        $areas = Area::get();
        return view('report.dynamic.documents.instruction.data', compact('areas'));
    }

    public function query(Request $request){
        $consults = null;
        $instruction_code = $request->instruction_code;
        $area_id = $request->area_id;
        $date_min = $request->date_min;
        $date_max = $request->date_max;
        $instruction_name = $request->instruction_name;
        //dd($request->all()); die();
        $consults = Instruction::select('*')->where(function ($query) use ($request){
            if ($request->instruction_code != null) {
                $query->where('instruction_code','LIKE','%'.$request->instruction_code.'%');
            }
            if ($request->area_id != null) {
                $query->where('area_id','LIKE','%'.$request->area_id.'%');
            }
            if ($request->date_min != null && $request->date_max != null) {
                $query->whereBetween('instruction_date', [$request->date_min, $request->date_max]);
            }
            if ($request->instruction_name != null) {
                $query->where('instruction_name','LIKE','%'.$request->instruction_name.'%');
            }
        })->orderBy('instruction_code', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.documents.instruction.pdf', compact('consults','fecha','cantidad','instruction_code','area_id','date_min','date_max','instruction_name'));
        return $pdf->stream();

    }
}
