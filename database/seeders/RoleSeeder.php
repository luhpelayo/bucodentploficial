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
        $role2 = Role::create(['name' =>'Director']);
        $role3 = Role::create(['name' =>'Acreditacion']);
        $role4 = Role::create(['name' =>'Extension']);
        $role5 = Role::create(['name' =>'Academico']);
        $role6 = Role::create(['name' =>'Titulacion']);
        $role7 = Role::create(['name' =>'Laboratorio']);

        //permisos para acceder a las rutas
        //MODULO DE ESTUDIANTES
        Permission::create(['name' => 'std.index'])->syncRoles([$role1, $role2,$role3,$role4,$role5,$role6]);
        Permission::create(['name' => 'student.create'])->syncRoles([$role1, $role2,$role4,$role5,$role6]);
        Permission::create(['name' => 'student.edit'])->syncRoles([$role1, $role2,$role3,$role4,$role5,$role6]);
        Permission::create(['name' => 'student.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'student.show'])->syncRoles([$role1, $role2,$role3,$role4,$role5,$role6]);
        Permission::create(['name' => 'student.pdf'])->syncRoles([$role1, $role2,$role3,$role4,$role5,$role6]);
        Permission::create(['name' => 'student.excel'])->syncRoles([$role1, $role2,$role3,$role4,$role5,$role6]); 

        //MODULO TITULADOS
        Permission::create(['name' => 'grad.index'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        //SUB MODULO ACTAS
        Permission::create(['name' => 'actas.index'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        //SUB MODULO ACTAS DE DEFENSA
        Permission::create(['name' => 'actaDefense.index'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'actadef.create'])->syncRoles([$role1, $role2,$role5,$role6]);
        Permission::create(['name' => 'actadef.edit'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'actadef.destroy'])->syncRoles([$role1, $role2,$role3,$role6]);
        Permission::create(['name' => 'actadef.show'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'actadef.pdf'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'actadef.excel'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        //SUB MODULO ACTAS DIRECTAS
        Permission::create(['name' => 'actaDirect.index'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'actadir.create'])->syncRoles([$role1, $role2,$role5,$role6]);
        Permission::create(['name' => 'actadir.edit'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'actadir.destroy'])->syncRoles([$role1, $role2,$role3,$role6]);
        Permission::create(['name' => 'actadir.show'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'actadir.pdf'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'actadir.excel'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);  
        //SUB MODULO CATEGORIAS
        Permission::create(['name' => 'categ.index'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'category.create'])->syncRoles([$role1, $role2,$role5,$role6]);
        Permission::create(['name' => 'category.edit'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'category.destroy'])->syncRoles([$role1, $role2,$role3,$role6]);
        Permission::create(['name' => 'category.show'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'category.pdf'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'category.excel'])->syncRoles([$role1, $role2,$role3,$role5,$role6]); 
        //SUB MODULO MODALIDADES
        Permission::create(['name' => 'modal.index'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'modality.create'])->syncRoles([$role1, $role2,$role5,$role6]);
        Permission::create(['name' => 'modality.edit'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'modality.destroy'])->syncRoles([$role1, $role2,$role3,$role6]);
        Permission::create(['name' => 'modality.show'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'modality.pdf'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'modality.excel'])->syncRoles([$role1, $role2,$role3,$role5,$role6]); 
        //SUB MODULO TFG
        Permission::create(['name' => 'tomo.index'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'tomo.create'])->syncRoles([$role1, $role2,$role5,$role6]);
        Permission::create(['name' => 'tomo.edit'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'tomo.destroy'])->syncRoles([$role1, $role2,$role3,$role6]);
        Permission::create(['name' => 'tomo.show'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'tomo.pdf'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        Permission::create(['name' => 'tomo.excel'])->syncRoles([$role1, $role2,$role3,$role5,$role6]);
        
        //MODULO PRACTICAS INDUSTRIALES
        Permission::create(['name' => 'prac.index'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'practices.create'])->syncRoles([$role1, $role2,$role5]);
        Permission::create(['name' => 'practices.edit'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'practices.destroy'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'practices.show'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'practices.pdf'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'practices.excel'])->syncRoles([$role1, $role2,$role3,$role5]);
        //SUB MODULO EMPRESAS
        Permission::create(['name' => 'company.create'])->syncRoles([$role1, $role2,$role5]);
        Permission::create(['name' => 'company.edit'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'company.destroy'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'company.show'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'company.pdf'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'company.excel'])->syncRoles([$role1, $role2,$role3,$role5]);

        //MODULO DE LABORATORIOS
        Permission::create(['name' => 'lab.index'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        //SUB MODULO GUIAS
        Permission::create(['name' => 'gui.index'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        Permission::create(['name' => 'guide.create'])->syncRoles([$role1, $role2,$role5,$role7]);
        Permission::create(['name' => 'guide.edit'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        Permission::create(['name' => 'guide.destroy'])->syncRoles([$role1, $role2,$role3,$role7]);
        Permission::create(['name' => 'guide.show'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        Permission::create(['name' => 'guide.pdf'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        Permission::create(['name' => 'guide.excel'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        //SUB MODULO FOTOS
        Permission::create(['name' => 'pho.index'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        Permission::create(['name' => 'photolab.create'])->syncRoles([$role1, $role2,$role5,$role7]);
        Permission::create(['name' => 'photolab.edit'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        Permission::create(['name' => 'photolab.destroy'])->syncRoles([$role1, $role2,$role3,$role7]);
        Permission::create(['name' => 'photolab.show'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        Permission::create(['name' => 'photolab.pdf'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        Permission::create(['name' => 'photolab.excel'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        //SUB MODULO INVESTIGACION
        Permission::create(['name' => 'inv.index'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        Permission::create(['name' => 'investigation.create'])->syncRoles([$role1, $role2,$role5,$role7]);
        Permission::create(['name' => 'investigation.edit'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        Permission::create(['name' => 'investigation.destroy'])->syncRoles([$role1, $role2,$role3,$role7]);
        Permission::create(['name' => 'investigation.show'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        Permission::create(['name' => 'investigation.pdf'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        Permission::create(['name' => 'investigation.excel'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        //SUB MODULO SEGUIMIENTO DE INVESTIGACION
        Permission::create(['name' => 'investigationtrace.create'])->syncRoles([$role1, $role2,$role5,$role7]);
        Permission::create(['name' => 'investigationtrace.edit'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);
        Permission::create(['name' => 'investigationtrace.destroy'])->syncRoles([$role1, $role2,$role3,$role7]);
        Permission::create(['name' => 'investigationtrace.show'])->syncRoles([$role1, $role2,$role3,$role5,$role7]);

        //MODULO DE VISITAS TECNICAS
        Permission::create(['name' => 'visit.index'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'visit.create'])->syncRoles([$role1, $role2,$role5]);
        Permission::create(['name' => 'visit.edit'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'visit.destroy'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'visit.show'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'visit.pdf'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'visit.excel'])->syncRoles([$role1, $role2,$role3,$role5]);

        //MODULO DE DOCUMENTOS
        Permission::create(['name' => 'doc.index'])->syncRoles([$role1, $role2,$role3,$role5]);
        //SUB MODULO AREAS
        Permission::create(['name' => 'area.index'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'area.create'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'area.edit'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'area.destroy'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'area.show'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'area.pdf'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'area.excel'])->syncRoles([$role1, $role2,$role3,$role5]);
        //SUB MODULO CARTAS
        Permission::create(['name' => 'lett.index'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'letter.create'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'letter.edit'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'letter.destroy'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'letter.show'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'letter.pdf'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'letter.excel'])->syncRoles([$role1, $role2,$role3,$role5]);
        //SUB MODULO PROCEDIMIENTOS
        Permission::create(['name' => 'proc.index'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'procedure.create'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'procedure.edit'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'procedure.destroy'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'procedure.show'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'procedure.pdf'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'procedure.excel'])->syncRoles([$role1, $role2,$role3,$role5]);
        //SUB MODULO INSTRUCTIVOS
        Permission::create(['name' => 'inst.index'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'instruction.create'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'instruction.edit'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'instruction.destroy'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'instruction.show'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'instruction.pdf'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'instruction.excel'])->syncRoles([$role1, $role2,$role3,$role5]);
        //SUB MODULO PROGRAMAS ANALITICOS
        Permission::create(['name' => 'prog.index'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'program.create'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'program.edit'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'program.destroy'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'program.show'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'program.pdf'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'program.excel'])->syncRoles([$role1, $role2,$role3,$role5]);

        //MODULO DE CONVENIOS
        Permission::create(['name' => 'agre.index'])->syncRoles([$role1, $role2,$role3,$role5]);
        //SUB MODULO NACIONAL
        Permission::create(['name' => 'nat.index'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'national.create'])->syncRoles([$role1, $role2,$role5]);
        Permission::create(['name' => 'national.edit'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'national.destroy'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'national.show'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'national.pdf'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'national.excel'])->syncRoles([$role1, $role2,$role3,$role5]);
        //SUB MODULO INTERNACIONAL
        Permission::create(['name' => 'inter.index'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'inter.create'])->syncRoles([$role1, $role2,$role5]);
        Permission::create(['name' => 'inter.edit'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'inter.destroy'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'inter.show'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'inter.pdf'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'inter.excel'])->syncRoles([$role1, $role2,$role3,$role5]);

        //MODULO DE CURSOS / TALLERES
        Permission::create(['name' => 'tra.index'])->syncRoles([$role1, $role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'tra.create'])->syncRoles([$role1, $role2,$role4,$role5]);
        Permission::create(['name' => 'tra.edit'])->syncRoles([$role1, $role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'tra.destroy'])->syncRoles([$role1, $role2,$role3,$role4]);
        Permission::create(['name' => 'tra.show'])->syncRoles([$role1, $role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'tra.pdf'])->syncRoles([$role1, $role2,$role3,$role4,$role5]);
        Permission::create(['name' => 'tra.excel'])->syncRoles([$role1, $role2,$role3,$role4,$role5]);

        //MODULO DE SEGUIMIENTO A TITULADOS
        Permission::create(['name' => 'track.index'])->syncRoles([$role1, $role2,$role3,$role5]);
        //SUB MODULO SEGUIMIENTO ACADEMICO
        Permission::create(['name' => 'acad.index'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'acad.create'])->syncRoles([$role1, $role2,$role5]);
        Permission::create(['name' => 'acad.edit'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'acad.destroy'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'acad.show'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'acad.pdf'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'acad.excel'])->syncRoles([$role1, $role2,$role3,$role5]);
        //SUB MODULO SEGUIMIENTO LABORAL
        Permission::create(['name' => 'work.index'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'work.create'])->syncRoles([$role1, $role2,$role5]);
        Permission::create(['name' => 'work.edit'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'work.destroy'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'work.show'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'work.pdf'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'work.excel'])->syncRoles([$role1, $role2,$role3,$role5]);
        //SUB MODULO SEGUIMIENTO CULTURAL
        Permission::create(['name' => 'cult.index'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'cult.create'])->syncRoles([$role1, $role2,$role5]);
        Permission::create(['name' => 'cult.edit'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'cult.destroy'])->syncRoles([$role1, $role2,$role3]);
        Permission::create(['name' => 'cult.show'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'cult.pdf'])->syncRoles([$role1, $role2,$role3,$role5]);
        Permission::create(['name' => 'cult.excel'])->syncRoles([$role1, $role2,$role3,$role5]);
    }
}
