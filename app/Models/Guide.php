<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    //relaciones
    public function matter(){
        return $this->belongsTo('App\Models\Matter');
    }
}
