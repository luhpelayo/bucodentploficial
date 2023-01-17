<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;
    public function consulta(){
        return $this->hasOne('App\Models\Consulta');
    }

    public function paciente(){
        return $this->hasOne('App\Models\Paciente');
    }
}
