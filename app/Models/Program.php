<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    //relaciones
    public function area(){
        return $this->belongsTo('App\Models\Area');
    }
}
