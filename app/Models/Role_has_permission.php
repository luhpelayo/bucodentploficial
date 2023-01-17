<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_has_permission extends Model
{
    use HasFactory;
    public function role(){
        return $this->hasOne('App\Models\Role');
    }

    public function permission(){
        return $this->hasOne('App\Models\Permission');
    }

    public function practices(){
        return $this->hasMany('App\Models\Practice');
    }

    public function academics(){
        return $this->hasMany('App\Models\Academic');
    }

    public function works(){
        return $this->hasMany('App\Models\Work');
    }

    public function cultures(){
        return $this->hasMany('App\Models\Culture');
    }

    public function assistances(){
        return $this->hasMany('App\Models\Assistance');
    }
}
