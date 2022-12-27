<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitPhoto extends Model
{
    use HasFactory;
    //relaciones
    public function visit(){
        return $this->belongsTo('App\Models\Visit');
    }
}
