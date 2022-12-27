<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    //relaciones
    public function documents(){
        return $this->hasMany('App\Models\TrainingDocument');
    }

    public function images(){
        return $this->hasMany('App\Models\TrainingImage');
    }

    public function assistances(){
        return $this->hasMany('App\Models\Assistance');
    }

    public function template(){
        return $this->hasOne('App\Models\Template');
    }
}
