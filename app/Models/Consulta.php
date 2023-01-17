<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;


    //relaciones

    public function diente(){
        return $this->hasOne('App\Models\Diente');
    }
    public function parte(){
        return $this->hasOne('App\Models\Parte');
    }
    public function tratamiento(){
        return $this->hasOne('App\Models\Tratamiento');
    }
    
    public function paciente(){
        return $this->hasOne('App\Models\Paciente');
    }
    public function odontologo(){
        return $this->hasOne('App\Models\Odontologo');
    }

    public function odontograma(){
        return $this->hasOne('App\Models\Odontograma');
    }
    public function servicio(){
        return $this->hasOne('App\Models\Servicio');
    }

    public function student(){
        return $this->hasOne('App\Models\Student');
    }
    public function tomo(){
        return $this->hasOne('App\Models\Tomo');
    }

    public function actadirecta(){
        return $this->hasOne('App\Models\DActa');
    }

    public function practices(){
        return $this->hasMany('App\Models\Practice');
    }

    public function academics(){
        return $this->hasMany('App\Models\Academic');
    }

    public function works(){
        return $this->hasMany('App\Models\Work');
    }

    public function cultures(){
        return $this->hasMany('App\Models\Culture');
    }

    public function assistances(){
        return $this->hasMany('App\Models\Assistance');
    }

}
