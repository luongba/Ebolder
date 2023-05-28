<?php

namespace App\models\Speak;

use Illuminate\Database\Eloquent\Model;

class QuestionSpeak extends Model
{
    protected $guarded = [];
    public function answers()
    {
        return $this->hasMany('App\models\Speak\AnswerSpeak', 'question_id');
    }
    public function right_answers(){
        return $this->hasOne('App\models\Speak\RightAnswerSpeak', 'question_id');
    }
}
