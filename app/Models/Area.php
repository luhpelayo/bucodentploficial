<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    //relaciones
    public function letters(){
        return $this->hasMany('App\Models\Letter');
    }

    public function procedures(){
        return $this->hasMany('App\Models\Procedure');
    }

    public function instructions(){
        return $this->hasMany('App\Models\Instruction');
    }

    public function programs(){
        return $this->hasMany('App\Models\Program');
    }
}
