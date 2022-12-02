<?php

namespace App\models\User;

use Illuminate\Database\Eloquent\Model;

class Permision extends Model
{
    protected $guarded = [];
    public function permisionChild(){
        return $this->hasMany('App\models\User\Permision', 'parent_id');
    }
}
