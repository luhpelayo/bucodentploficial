<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    use HasFactory;

    //relaciones
    public function tomo(){
        return $this->belongsTo('App\Models\Tomo');
    }
}
