<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    use HasFactory;

    public function training(){
        return $this->belongsTo('App\Models\Training');
    }

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }
}
