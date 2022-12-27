<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabPhoto extends Model
{
    use HasFactory;
    //relaciones
    public function laboratory(){
        return $this->belongsTo('App\Models\LaboratoryPhoto');
    }
}
