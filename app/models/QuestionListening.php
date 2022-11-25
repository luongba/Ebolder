<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class QuestionListening extends Model
{
    protected $guarded = [];

    public function answerListening(){
        return $this->hasMany('App\models\AnswerListening', 'question_id');
    }
    public function rightAnswers(){
        return $this->hasOne('App\models\RightAnswerListening', 'question_id');
    }
}
