<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DActa extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }

    public function modality(){
        return $this->belongsTo('App\Models\Modality');
    }

}
