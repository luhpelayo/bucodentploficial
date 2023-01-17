<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\RolesExport;
use Maatwebsite\Excel\Facades\Excel;

class RoleController extends Controller
{
    public function create(){
        return view ('role.addRole');
    }

    public function edit($id){
        $role = Role::findOrFail($id);
        return view('role.editRole',compact('role'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|max:30',
            'guard_name' => 'required|max:30',
            
        ]);
        $role = Role::findOrFail($request->id);
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        
        $role->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('role.show');

    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:30',
            'guard_name' => 'required|max:30',
            
        ]);
       
        
            
            $role = new Role;
            $role->name = $request->name;
            $role->guard_name = $request->guard_name;
         
            $role->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('role.show');
    }

    public function show(){
        $roles = Role::all();
        return view ('role.viewRole', compact('roles'));
    }

    public function destroy($id){
        $role = Role::findOrFail($id);
        $role->delete();
        alert()->success('Role Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $roles = Role::orderBy('name')->get();
        $fecha = Carbon::now();
        $cantidad = Role::count();   
        $pdf = PDF::loadView('role.staticpdf', compact('roles','fecha','cantidad'));
        return $pdf->download('role.pdf');
    }

    public function allexcel(){
        return Excel::download(new RolesExport, 'roles.xlsx');
    }

    //REPORTES
    public function report()
    {
        return view('report.dynamic.role.data');
    }

    public function query(Request $request)
    {
        $consults = null;
        $name = $request->name;
        $guard_name = $request->guard_name;
        $precio = $request->precio;
        $consults = Role::select('*')->where(function ($query) use ($request){
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
        $pdf = PDF::loadView('report.dynamic.role.pdf', compact('consults','fecha','cantidad','name','guard_name'));
        return $pdf->stream();
    }
}
