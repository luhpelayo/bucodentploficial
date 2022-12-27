<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    //relaciones
    public function matter(){
        return $this->belongsTo('App\Models\Matter');
    }

    public function photos(){
        return $this->hasMany('App\Models\VisitPhoto');
    }

    public function documents(){
        return $this->hasMany('App\Models\VisitDocument');
    }

}
