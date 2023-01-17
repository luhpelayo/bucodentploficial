<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichaclinica extends Model
{
    use HasFactory;
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

    public function archivo(){
        return $this->belongsTo('App\Models\Archivo');
    }

    public function consulta(){
        return $this->belongsTo('App\Models\Consulta');
    }

    public function photos(){
        return $this->hasMany('App\Models\VisitPhoto');
    }

    public function documents(){
        return $this->hasMany('App\Models\VisitDocument');
    }
}
