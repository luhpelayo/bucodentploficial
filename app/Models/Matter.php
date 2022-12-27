<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    use HasFactory;

    public function practices(){
        return $this->hasMany('App\Models\Practice');
    }

    public function guides(){
        return $this->hasMany('App\Models\Guide');
    }

    public function laboratories(){
        return $this->hasMany('App\Models\LaboratoryPhoto');
    }

    public function visits(){
        return $this->hasMany('App\Models\Visit');
    }

}
