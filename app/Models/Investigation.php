<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    use HasFactory;

    //relaciones
    public function traces(){
        return $this->hasMany('App\Models\InvestigationTrace');
    }
}
