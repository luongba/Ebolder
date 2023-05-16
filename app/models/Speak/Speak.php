<?php

namespace App\models\Speak;

use Illuminate\Database\Eloquent\Model;

class Speak extends Model
{
    protected $guarded = [];

    public function QuestitonSpeak(){
        return $this->belongsToMany('App\models\Speak\QuestionSpeak','question_speak_relationship' );
    }
}
