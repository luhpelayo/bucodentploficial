<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role_has_permission;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Parte;
use PDF;
use Carbon\Carbon;
use App\Exports\Role_has_permissionsExport;
use Maatwebsite\Excel\Facades\Excel;
class Role_has_permissionController extends Controller
{
    public function create(){
        $roles = Role::get();
        $permissions = Permission::get();
      
        return view ('role_has_permission.addRole_has_permission', compact('roles','permissions','partes'));
    }

    public function store(Request $request){
        $validated = $request->validate([
           
            'role_id3' => 'required',
            'permission_id3' => 'required',
           
        ]);
        //dd($request->all()); die();
        $role_has_permission = new Role_has_permission;
       
        $role_has_permission->role_id = $request->role_id3;
        $role_has_permission->permission_id = $request->permission_id3;
       
        $role_has_permission->save();
        alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('role_has_permission.show');

    }

    public function edit($id){
        $role_has_permission = Role_has_permission::findOrFail($id);
        $roles = Role::get();
        $permissions = Permission::get();
       
        return view('role_has_permission.editRole_has_permission',compact('role_has_permission','roles','permissions','partes'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
          
            'role_id3' => 'required',
            'permission_id3' => 'required',
        
        ]);
        //dd($request->all()); die();
        $role_has_permission = Role_has_permission::findOrFail($id);
       
        $role_has_permission->role_id = $request->role_id3;
        $role_has_permission->permission_id = $request->permission_id3;
       
        $role_has_permission->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('role_has_permission.show');
    }

    public function show(){
        $role_has_permissions = Role_has_permission::all();
       // dd($role_has_permissions);
        return view ('role_has_permission.viewRole_has_permission', compact('role_has_permissions'));
    }

    public function destroy($id){
        $role_has_permission = Role_has_permission::findOrFail($id);
        $role_has_permission->delete();
        alert()->success('Actividad Cultural Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }


    ///modificar
    public function allpdf(){
        $role_has_permissions = Role_has_permission::orderBy('role_id')->get();
        $fecha = Carbon::now();
        $cantidad = Role_has_permission::count();   
        $pdf = PDF::loadView('role_has_permission.staticpdf', compact('role_has_permissions','fecha','cantidad'));
        return $pdf->download('role_has_permissions.pdf');
    }

    public function allexcel(){
        return Excel::download(new Role_has_permissionsExport, 'role_has_permissions.xlsx');
    }

    public function report()
    {
        $roles = Role::get();
        $permissions = Permission::get();
     
        return view('report.dynamic.role_has_permission.data', compact('roles','permissions','partes'));
    }

    public function query(Request $request){
        $consults = null;
        $role_id = $request->role_id;
   
        $permission_id = $request->permission_id;
       
        //dd($request->all()); die();
        $consults = Role_has_permission::select('*')->where(function ($query) use ($request){
            if ($request->role_id != null) {
                $query->where('role_id','LIKE','%'.$request->role_id.'%');
            }
          
            if ($request->permission_id != null) {
                $query->where('permission_id','LIKE','%'.$request->permission_id.'%');
            }
         
        })->orderBy('role_id', 'Asc')->get();

        if (empty($consults)) {
            alert()->error('Consulta Vacia','Por Favor rellene algun campo')->position('top-end')->autoclose(2000);
            return back();
        }

        //dd($consults, $request->all()); die();
        $fecha = Carbon::now();
        $cantidad = count($consults);
        $pdf = PDF::loadView('report.dynamic.role_has_permission.pdf', compact('consults','fecha','cantidad','role_id','parteid','permission_id','diagnostico','role_id', 'fechafin'));
        return $pdf->stream();

    }
}