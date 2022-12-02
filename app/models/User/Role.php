<?php

namespace App\models\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    public function permisions(){
        return $this->belongsToMany('App\models\User\Permision', 'permision_role');
    }
}
