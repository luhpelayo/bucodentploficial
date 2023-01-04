<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //roles del sistema
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' =>'Secretaria']);
        $role3 = Role::create(['name' =>'Doctor']);

        //permisos para acceder a las rutas
        //MODULO DE ESTUDIANTES
        Permission::create(['name' => 'std.index'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'student.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'student.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'student.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'student.show'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'student.pdf'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'student.excel'])->syncRoles([$role1, $role2,$role3]); 


        //permisos para acceder a las rutas
        //MODULO DE CARGOS
        Permission::create(['name' => 'cargo.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'cargo.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'cargo.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'cargo.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'cargo.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'cargo.pdf'])->syncRoles([$role1]);
        Permission::create(['name' => 'cargo.excel'])->syncRoles([$role1]); 


         //permisos para acceder a las rutas
        //MODULO DE PACIENTES
        Permission::create(['name' => 'paciente.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'paciente.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'paciente.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'paciente.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'paciente.show'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'paciente.pdf'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'paciente.excel'])->syncRoles([$role1, $role2]); 

        //permisos para acceder a las rutas
        //MODULO DE ODONTOLOGOS
        Permission::create(['name' => 'odontologo.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'odontologo.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'odontologo.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'odontologo.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'odontologo.show'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'odontologo.pdf'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'odontologo.excel'])->syncRoles([$role1, $role2]); 

        //permisos para acceder a las rutas
        //MODULO DE SERVICIOS
        Permission::create(['name' => 'servicio.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'servicio.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'servicio.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'servicio.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'servicio.show'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'servicio.pdf'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'servicio.excel'])->syncRoles([$role1, $role2]); 

         //permisos para acceder a las rutas
        //MODULO DE ARCHIVO
        Permission::create(['name' => 'archivo.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'archivo.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'archivo.edit'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'archivo.destroy'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'archivo.show'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'archivo.pdf'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'archivo.excel'])->syncRoles([$role1, $role3]);

         //permisos para acceder a las rutas
        //MODULO DE CONSULTA
        Permission::create(['name' => 'consulta.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'consulta.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'consulta.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'consulta.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'consulta.show'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'consulta.pdf'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'consulta.excel'])->syncRoles([$role1, $role2]); 
        

        //permisos para acceder a las rutas
        //MODULO DE RECETAS
        Permission::create(['name' => 'receta.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'receta.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'receta.edit'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'receta.destroy'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'receta.show'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'receta.pdf'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'receta.excel'])->syncRoles([$role1, $role2]); 


        //permisos para acceder a las rutas
        //MODULO DE ficha clinica
        Permission::create(['name' => 'fichaclinica.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'fichaclinica.create'])->syncRoles([$role1,$role2, $role3]);
        Permission::create(['name' => 'fichaclinica.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'fichaclinica.destroy'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'fichaclinica.show'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'fichaclinica.pdf'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'fichaclinica.excel'])->syncRoles([$role1, $role2, $role3]);


        //permisos para acceder a las rutas
        //MODULO DE RECIBO
        Permission::create(['name' => 'recibo.index'])->syncRoles([$role1, $role2, ]);
        Permission::create(['name' => 'recibo.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'recibo.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'recibo.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'recibo.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'recibo.pdf'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'recibo.excel'])->syncRoles([$role1, $role2]); 

        //permisos para acceder a las rutas
        //MODULO DE DIENTE
        Permission::create(['name' => 'dient.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'diente.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'diente.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'diente.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'diente.show'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'diente.pdf'])->syncRoles([$role1]);
        Permission::create(['name' => 'diente.excel'])->syncRoles([$role1]); 


        //permisos para acceder a las rutas
        //MODULO DE PARTES
        Permission::create(['name' => 'parte.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'parte.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'parte.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'parte.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'parte.show'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'parte.pdf'])->syncRoles([$role1]);
        Permission::create(['name' => 'parte.excel'])->syncRoles([$role1]); 


        //permisos para acceder a las rutas
        //MODULO DE TRATAMIENTO
        Permission::create(['name' => 'tratamiento.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tratamiento.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tratamiento.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tratamiento.destroy'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tratamiento.show'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'tratamiento.pdf'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'tratamiento.excel'])->syncRoles([$role1,$role2]); 

        //permisos para acceder a las rutas
        //MODULO DE ODONTOGRAMA
        Permission::create(['name' => 'odontograma.index'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'odontograma.create'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'odontograma.edit'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'odontograma.destroy'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'odontograma.show'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'odontograma.pdf'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'odontograma.excel'])->syncRoles([$role1,$role3]); 
      
        //MODULO DE DOCUMENTOS
        Permission::create(['name' => 'doc.index'])->syncRoles([$role1, $role2,$role3]);  

        //SUB MODULO AREAS
        Permission::create(['name' => 'area.index'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'area.create'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'area.edit'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'area.destroy'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'area.show'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'area.pdf'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'area.excel'])->syncRoles([$role1, $role2,$role3]);

        //MODULO DE VISITAS TECNICAS
        Permission::create(['name' => 'visit.index'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'visit.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'visit.edit'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'visit.destroy'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'visit.show'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'visit.pdf'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'visit.excel'])->syncRoles([$role1, $role2,$role3]);

          //SUB MODULO TFG
          Permission::create(['name' => 'tomo.index'])->syncRoles([$role1, $role2,$role3]);
          Permission::create(['name' => 'tomo.create'])->syncRoles([$role1, $role2]);
          Permission::create(['name' => 'tomo.edit'])->syncRoles([$role1, $role2]);
          Permission::create(['name' => 'tomo.destroy'])->syncRoles([$role1, $role2,$role3]);
          Permission::create(['name' => 'tomo.show'])->syncRoles([$role1, $role2,$role3]);
          Permission::create(['name' => 'tomo.pdf'])->syncRoles([$role1, $role2,$role3]);
          Permission::create(['name' => 'tomo.excel'])->syncRoles([$role1, $role2,$role3]);
    }
}
