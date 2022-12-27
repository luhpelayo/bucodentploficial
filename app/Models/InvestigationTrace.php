<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestigationTrace extends Model
{
    use HasFactory;

    //relaciones
    public function investigation(){
        return $this->belongsTo('App\Models\Investigation');
    }

    public function documents(){
        return $this->hasMany('App\Models\InvestigationDocument','investigationtrace_id','investigation_traces_id');
    }

    public function photos(){
        return $this->hasMany('App\Models\InvestigationPhoto','investigationtrace_id','investigation_traces_id');
    }
}
