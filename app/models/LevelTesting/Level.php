<?php

namespace App\models\LevelTesting;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $guarded = [];

    public function Learn(){
        return $this->belongsToMany('App\models\Learn\Learn','learn_levels');
    }

    public function ExamResult(){
        return $this->hasOne('App\models\Learn\ExamResult');
    }
}
