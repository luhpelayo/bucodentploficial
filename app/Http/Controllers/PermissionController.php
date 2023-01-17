<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\PermissionsExport;
use Maatwebsite\Excel\Facades\Excel;

class PermissionController extends Controller
{
    public function create(){
        return view ('permission.addPermission');
    }

    public function edit($id){
        $permission = Permission::findOrFail($id);
        return view('permission.editPermission',compact('permission'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|max:30',
            'guard_name' => 'required|max:30',
            
        ]);
        $permission = Permission::findOrFail($request->id);
        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        
        $permission->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('permission.show');

    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:30',
            'guard_name' => 'required|max:30',
            
        ]);
       
        
            
            $permission = new Permission;
            $permission->name = $request->name;
            $permission->guard_name = $request->guard_name;
         
            $permission->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('permission.show');
    }

    public function show(){
        $permissions = Permission::all();
        return view ('permission.viewPermission', compact('permissions'));
    }

    public function destroy($id){
        $permission = Permission::findOrFail($id);
        $permission->delete();
        alert()->success('Permission Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $permissions = Permission::orderBy('name')->get();
        $fecha = Carbon::now();
        $cantidad = Permission::count();   
        $pdf = PDF::loadView('permission.staticpdf', compact('permissions','fecha','cantidad'));
        return $pdf->download('permission.pdf');
    }

    public function allexcel(){
        return Excel::download(new PermissionsExport, 'permissions.xlsx');
    }

    //REPORTES
    public function report()
    {
        return view('report.dynamic.permission.data');
    }

    public function query(Request $request)
    {
        $consults = null;
        $name = $request->name;
        $guard_name = $request->guard_name;
        $precio = $request->precio;
        $consults = Permission::select('*')->where(function ($query) use ($request){
            if ($request->name != null) {
                $query->where('name','LIKE','%'.$request->name.'%');
            }
            if ($request->guard_name != null) {
                $query->where('guard_name','LIKE','%'.$request->guard_name.'%');
            }
         

        })->orderBy('name', 'ASC')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.permission.pdf', compact('consults','fecha','cantidad','name','guard_name'));
        return $pdf->stream();
    }
}
