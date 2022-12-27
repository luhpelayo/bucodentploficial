<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratoryPhoto extends Model
{
    use HasFactory;

    //relaciones
    public function matter(){
        return $this->belongsTo('App\Models\Matter');
    }

    public function labphotos(){
        return $this->hasMany('App\Models\LabPhoto','laboratoryphoto_id','laboratory_photos_id');
    }
}
