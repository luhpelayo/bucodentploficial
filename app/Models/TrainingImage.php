<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingImage extends Model
{
    use HasFactory;
    //relaciones
    public function training(){
        return $this->belongsTo('App\Models\Training');
    }
}
