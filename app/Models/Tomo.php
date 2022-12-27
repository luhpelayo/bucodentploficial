<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tomo extends Model
{
    use HasFactory;

    //relaciones
    public function student(){
        return $this->belongsTo('App\Models\Student');
    }

    public function modality(){
        return $this->belongsTo('App\Models\Modality');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function acta(){
        return $this->hasOne('App\Models\Acta');
    }

}
