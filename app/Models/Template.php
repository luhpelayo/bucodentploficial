<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    public function training(){
        return $this->belongsTo('App\Models\Training');
    }

    public function certificate(){
        return $this->hasMany('App\Models\Certificate');
    }
}
