<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestigationPhoto extends Model
{
    use HasFactory;

    //relaciones
    public function trace(){
        return $this->belongsTo('App\Models\InvestigationTrace');
    }
}
