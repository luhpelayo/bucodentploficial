<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
    use HasFactory;

    public function tomos(){
        return $this->hasMany('App\Models\Tomo');
    }

    public function actasdirectas(){
        return $this->hasMany('App\Models\DActa');
    }

}
