<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matter;
use Illuminate\Support\Facades\DB;
class MatterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matters =  [
            ['matter_name' => 'Practicas Industriales','matter_initial' => 'IND250','matter_group' => 'I','matter_teacher' => 'Chahin Avichacra Juan Manuel'],
            ['matter_name' => 'Practicas Industriales','matter_initial' => 'IND250','matter_group' => 'Y','matter_teacher' => 'Gutiérrez Chávez Benjamín'],
            ['matter_name' => 'Practicas Industriales','matter_initial' => 'IND250','matter_group' => 'Z','matter_teacher' => 'Chahin Avichacra Juan Manuel'],
            ['matter_name' => 'Control de Calidad','matter_initial' => 'IND245','matter_group' => 'I','matter_teacher' => 'Dávalos Sánchez de Mancilla Pilar'],
            ['matter_name' => 'Control de Calidad','matter_initial' => 'IND245','matter_group' => 'Y','matter_teacher' => 'Dávalos Sánchez de Mancilla Pilar'],
            ['matter_name' => 'Procesos Industriales','matter_initial' => 'IND225','matter_group' => 'I','matter_teacher' => 'Vargas Añez Carlos'],
            ['matter_name' => 'Procesos Industriales','matter_initial' => 'IND225','matter_group' => 'Y','matter_teacher' => 'Vargas Añez Carlos'],
            ['matter_name' => 'Ingeniería de Métodos','matter_initial' => 'IND223','matter_group' => 'I','matter_teacher' => 'Cabrera Peña Mauro'],
            ['matter_name' => 'Ingeniería de Métodos','matter_initial' => 'IND223','matter_group' => 'Y','matter_teacher' => 'Chahin Avichacra Juan Manuel'],
            ['matter_name' => 'Ingeniería de Métodos','matter_initial' => 'IND223','matter_group' => 'Z','matter_teacher' => 'Canavire Fernando Castillo'],
            ['matter_name' => 'Elementos de Maquinas','matter_initial' => 'MEC255','matter_group' => 'I','matter_teacher' => 'Cabrera Peña Mauro'],
            ['matter_name' => 'Elementos de Maquinas','matter_initial' => 'MEC255','matter_group' => 'Y','matter_teacher' => 'Cabrera Peña Mauro']];
          Matter::insert($matters);
    }
}