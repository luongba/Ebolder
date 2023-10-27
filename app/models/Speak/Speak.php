<?php

namespace App\models\Speak;

use Illuminate\Database\Eloquent\Model;

class Speak extends Model
{
    protected $guarded = [];

    public function QuestionSpeak(){
        return $this->belongsToMany('App\models\Speak\QuestionSpeak','question_speak_relationship' );
    }

    public function QuestionSpeakRelationship(){
        return $this->hasMany('App\models\Speak\QuestionSpeakRelationship','speak_id' );
    }
}
