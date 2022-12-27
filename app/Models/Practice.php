<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    //relaciones
    public function student(){
        return $this->belongsTo('App\Models\Student');
    }

    public function company(){
        return $this->belongsTo('App\Models\Company');
    }

    public function matter(){
        return $this->belongsTo('App\Models\Matter');
    }

}
